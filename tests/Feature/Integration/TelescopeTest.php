<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\TelescopeServiceProvider;
use Laravel\Telescope\Telescope;

dataset('envs', [
    'local' => ['local', true],
    'staging' => ['staging', false],
    'testing' => ['testing', false],
    'production' => ['production', false],
]);

test('telescope provider registration by environment', function (string $env, bool $shouldLoad): void {
    $this->app['env'] = $env;
    $provider = new AppServiceProvider($this->app);
    $provider->register();

    $loaded = $this->app->getLoadedProviders();

    $hasCore = isset($loaded[\Laravel\Telescope\TelescopeServiceProvider::class]);
    $hasApp = isset($loaded[TelescopeServiceProvider::class]);

    expect($hasCore)->toBe($shouldLoad);
    expect($hasApp)->toBe($shouldLoad);
})->with('envs')->group('providers');

test('hides sensitive request details when environment is not local', function (): void {
    // Note: default env is 'testing'
    $provider = new TelescopeServiceProvider($this->app);
    $provider->register();

    expect(Telescope::$hiddenRequestHeaders)->toBe([
        'authorization',
        'php-auth-pw',
        'cookie',
        'x-csrf-token',
        'x-xsrf-token',
    ]);

    expect(Telescope::$hiddenRequestParameters)->toBe([
        'password',
        'password_confirmation',
        '_token',
    ]);
})->group('providers');
