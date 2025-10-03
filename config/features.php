<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    |
    | Centralized configuration for all feature flags in the application.
    | Each flag should include a unique key, an owner, a created_at date,
    | and an optional remove_by date for lifecycle tracking.
    |
    */

    'flags' => [

        // 'tasks.progress_tracking' => [
        //     'description' => 'Enable percentage-based task completion',
        //     'owner'       => 'team:product',
        //     'created_at'  => '2025-09-01',
        //     'remove_by'   => '2025-12-01',
        //     'ticket'      => 'PROJ-101',
        //     'enabled'     => env('FEATURE_TASKS_PROGRESS_TRACKING', false),
        // ],

    ],

];
