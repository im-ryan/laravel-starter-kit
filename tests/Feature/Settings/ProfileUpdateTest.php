<?php

declare(strict_types=1);

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

test('profile page is displayed', function (): void {
    actingAs(getFirstUser())
        ->get('/settings/profile')
        ->assertOk();
});

test('profile information can be updated', function (): void {
    $user = getFirstUser();

    actingAs($user)
        ->patch('/settings/profile', [
            'name' => 'Updated Name',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/settings/profile');

    $user->refresh();

    expect($user->name)->toBe('Updated Name');
});

test('user can delete their account', function (): void {
    $user = getFirstUser();

    actingAs($user)
        ->delete('/settings/profile', [
            'password' => 'password',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    assertGuest();
    expect($user->fresh())->toBeNull();
});
