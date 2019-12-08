<?php
/**
 * A service for accessing the database in regards to the email_verification table
 */

namespace App\Services\DataAccess;

use App\Models\EmailVerification;
use App\User;

class EmailVerificationDataService
{

    /**
     * @param $data
     * @return mixed
     */
    public function createEmailVerificationData ($data)
    {
        return EmailVerification::create($data);
    }

    /**
     * @param $token
     * @return User
     */
    public function getUserFromToken ($token)
    {
        return EmailVerification::where('token', $token)->firstOrFail()->user;
    }
}
