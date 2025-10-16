<?php

declare(strict_types=1);

use App\Http\Requests\AuthenticationRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Carbon;
use Laravel\WorkOS\User as WorkOSUser;

/** @param  array{id?:string,firstName?:?string,lastName?:?string,email?:string,avatar?:?string}  $attrs */
function createUserFrom(array $attrs): User
{
    $request = new AuthenticationRequest();
    $method = new \ReflectionClass($request)->getMethod('createUsing');

    $workosUser = new WorkOSUser(
        id: $attrs['id'] ?? 'workos-1',
        organizationId: null,
        firstName: $attrs['firstName'] ?? null,
        lastName: $attrs['lastName'] ?? null,
        email: $attrs['email'] ?? 'u@example.com',
        avatar: $attrs['avatar'] ?? null,
    );

    /** @var User $user */
    $user = $method->invoke($request, $workosUser);

    return $user;
}

dataset('createUsing-cases', [
    'full name + avatar' => [
        ['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'john@d.com', 'avatar' => 'https://a.vtr/j.jpg'],
        ['name' => 'John Doe', 'email' => 'john@d.com', 'avatar' => 'https://a.vtr/j.jpg'],
    ],
    'null avatar → empty string' => [
        ['firstName' => 'Jane', 'lastName' => 'Smith', 'email' => 'jane@s.com', 'avatar' => null],
        ['name' => 'Jane Smith', 'email' => 'jane@s.com', 'avatar' => ''],
    ],
    'empty last name' => [
        ['firstName' => 'SingleName', 'lastName' => '', 'email' => 'single@name.com'],
        ['name' => 'SingleName ', 'email' => 'single@name.com'],
    ],
    'both empty' => [
        ['firstName' => '', 'lastName' => '', 'email' => 'no@name.com'],
        ['name' => ' ', 'email' => 'no@name.com'],
    ],
    'both null' => [
        ['firstName' => null, 'lastName' => null, 'email' => 'null@name.com'],
        ['name' => ' ', 'email' => 'null@name.com'],
    ],
    'mixed null + value' => [
        ['firstName' => null, 'lastName' => 'OnlyLast', 'email' => 'mixed@name.com'],
        ['name' => ' OnlyLast', 'email' => 'mixed@name.com'],
    ],
]);

test('createUsing maps attributes correctly', function (array $input, array $expected): void {
    Carbon::setTestNow('2023-01-01 12:00:00');

    $user = createUserFrom($input);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe($expected['name']);
    expect($user->email)->toBe($expected['email']);

    if (array_key_exists('avatar', $expected)) {
        expect($user->avatar)->toBe($expected['avatar']);
    }

    expect($user->email_verified_at->format('Y-m-d H:i:s'))->toBe('2023-01-01 12:00:00');

    Carbon::setTestNow();
})->with('createUsing-cases');

dataset('timestamps', [
    'jan-01' => '2023-01-01 12:00:00',
    'jun-15' => '2023-06-15 14:30:45',
]);

test('createUsing sets email_verified_at to now', function (string $now): void {
    Carbon::setTestNow($now);

    $user = createUserFrom(['firstName' => 'Time', 'lastName' => 'Test', 'email' => 'time@test.com']);

    expect($user->email_verified_at->format('Y-m-d H:i:s'))->toBe($now);

    Carbon::setTestNow();
})->with('timestamps');

test('createUsing persists user to database', function (): void {
    Carbon::setTestNow('2023-01-01 12:00:00');

    $user = createUserFrom([
        'id' => 'workos-789',
        'firstName' => 'Bob',
        'lastName' => 'Johnson',
        'email' => 'bob.johnson@example.com',
        'avatar' => 'https://example.com/bob.jpg',
    ]);

    expect($user->exists)->toBeTrue();
    expect($user->wasRecentlyCreated)->toBeTrue();

    $this->assertDatabaseHas('users', [
        'name' => 'Bob Johnson',
        'email' => 'bob.johnson@example.com',
        'workos_id' => 'workos-789',
        'avatar' => 'https://example.com/bob.jpg',
        'email_verified_at' => '2023-01-01 12:00:00',
    ]);

    Carbon::setTestNow();
});

test('createUsing uses configured user model from config', function (): void {
    $user = createUserFrom([
        'id' => 'workos-config-test',
        'firstName' => 'Config',
        'lastName' => 'Test',
        'email' => 'config@test.com',
        'avatar' => null,
    ]);

    expect($user)->toBeInstanceOf(User::class);
    expect($user::class)->toBe(config('auth.providers.users.model'));
});

test('createUsing returns an Authenticatable user', function (): void {
    $user = createUserFrom([
        'id' => 'workos-auth',
        'firstName' => 'Auth',
        'lastName' => 'Test',
        'email' => 'auth@test.com',
    ]);

    expect($user)->toBeInstanceOf(Authenticatable::class);
    expect($user->getAuthIdentifier())->toBe($user->id);
});
