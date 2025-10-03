<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        $this->registerTelescope();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->disableResourceWrapping();
    }

    public function shouldRegisterTelescope(): bool
    {
        return app()->isLocal() && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class);
    }

    private function disableResourceWrapping(): void
    {
        JsonResource::withoutWrapping();
    }

    private function registerTelescope(): void
    {
        if ($this->shouldRegisterTelescope()) {
            app()->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            app()->register(TelescopeServiceProvider::class);
        }
    }
}
