<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;
use Override;

class FeatureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    #[Override]
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /** @var array<string, array<string, mixed>> $flags */
        $flags = config('features.flags', []);

        foreach ($flags as $name => $meta) {
            if ( ! array_key_exists('enabled', $meta)) {
                continue;
            }

            Feature::define($name, $meta['enabled']);
        }
    }
}
