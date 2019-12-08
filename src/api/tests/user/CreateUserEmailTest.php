<?php

use Illuminate\Support\Facades\Mail;


class CreateUserEmailTest extends \Tests\AbstractTestCase
{
    public function testCreateNewUserEmailVerification() {
        Mail::fake();
        factory(\App\User::class)->create();

        Mail::assertQueued(\App\Mail\EmailVerification::class);
    }
}
