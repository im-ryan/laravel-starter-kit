<?php

declare(strict_types=1);

use App\Providers\FeatureServiceProvider;
use Illuminate\Support\Facades\Config;
use Laravel\Pennant\Feature;

dataset('features', [
    'booleans' => [
        'config' => [
            'flags' => [
                'new_ui' => ['enabled' => true],
                'off_switch' => ['enabled' => false],
                'no_key' => [],
            ],
        ],
        'expect' => [
            'new_ui' => true,
            'off_switch' => false, // not defined
            'no_key' => false,     // not defined
        ],
    ],
    'callables' => [
        'config' => [
            'flags' => [
                'dyn_on' => ['enabled' => fn(): true => true],
                'dyn_off' => ['enabled' => fn(): false => false],
            ],
        ],
        'expect' => [
            'dyn_on' => true,
            'dyn_off' => false,
        ],
    ],
    'missing-config' => [
        'config' => null, // treated as []
        'expect' => [
            'anything' => false,
        ],
    ],
]);

it('boots and defines features per config', function (mixed $config, array $expect): void {
    Config::set('features', $config);

    new FeatureServiceProvider(app())->boot();

    foreach ($expect as $name => $active) {
        expect(Feature::active($name))->toBe($active);
    }
})->with('features')->group('providers');
