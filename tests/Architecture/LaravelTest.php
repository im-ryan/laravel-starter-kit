<?php

declare(strict_types=1);

use App\Providers\TelescopeServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

arch()->preset()->php();

arch()->preset()->security();

arch()->preset()->laravel()
    ->ignoring(TelescopeServiceProvider::class);

arch('factories')
    ->expect('Database\Factories')
    ->toExtend(Factory::class)
    ->toHaveMethod('definition')
    ->toOnlyBeUsedIn([
        'App\Models',
        'Database\Seeders',
    ]);
