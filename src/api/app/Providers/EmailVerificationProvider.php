<?php

namespace App\Providers;

use App\Mail\EmailVerification;
use App\Services\Verification\EmailVerificationService;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class EmailVerificationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(
        EmailVerificationService $emailVerificationService
    )
    {
        // On user created create a new Verification Token
        User::created(function ($model) use ($emailVerificationService) {
            $token = $emailVerificationService->createEmailVerificationToken($model);
            Mail::to($model)
                ->queue(new EmailVerification($token->token, $model->name));
        });
    }

}
