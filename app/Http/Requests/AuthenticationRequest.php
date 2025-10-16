<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Config;
use Laravel\WorkOS\Http\Requests\AuthKitAuthenticationRequest;
use Laravel\WorkOS\User;
use Override;

class AuthenticationRequest extends AuthKitAuthenticationRequest
{
    /**
     * Create a user from the given WorkOS user.
     */
    #[Override]
    protected function createUsing(User $user): Authenticatable
    {
        /** @var class-string<\App\Models\User> $userClass */
        $userClass = Config::get('auth.providers.users.model', '');

        /** @var \App\Models\User $userModel */
        $userModel = resolve($userClass);

        $userModel->fill([
            'name' => $user->firstName . ' ' . $user->lastName,
            'email' => $user->email,
            'workos_id' => $user->id,
            'avatar' => $user->avatar ?? '',
        ]);

        $userModel->email_verified_at = now()->toDateTimeString();
        $userModel->save();

        return $userModel;
    }
}
