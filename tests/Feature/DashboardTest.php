<?php

declare(strict_types=1);

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('guests are redirected to the login page', function (): void {
    get('/dashboard')
        ->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function (): void {
    actingAs(getFirstUser())
        ->get('/dashboard')
        ->assertOk();
});
