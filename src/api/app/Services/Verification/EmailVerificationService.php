<?php
/**
 * Class EmailVerificationService
 * Author: William Rich
 *
 * Responsible for creating the needed data when a new user is added and validation requests to validate emails
 */
namespace App\Services\Verification;

use App\Models\EmailVerification;
use App\User;
use App\Helpers\TokenHelper;
use App\Services\DataAccess\EmailVerificationDataService;

class EmailVerificationService
{

    /**
     * @var EmailVerificationDataService]
     */
    private $emailVerificationDataService;

    /**
     * EmailVerificationService constructor.
     * @param EmailVerificationDataService $emailVerificationDataService
     */
    public function __construct(
        EmailVerificationDataService $emailVerificationDataService
    )
    {
        $this->emailVerificationDataService = $emailVerificationDataService;
    }

    /**
     * @param User $user
     * @return EmailVerification
     */
    public function createEmailVerificationToken(User $user)
    {
        $dataArray = [
            'user_id' => $user->id,
            'token' => TokenHelper::generateToken()
        ];

        return $this->emailVerificationDataService->createEmailVerificationData($dataArray);
    }

    public function verifyAccount($token)
    {
        /** @var User $user */
        $user = $this->emailVerificationDataService->getUserFromToken($token);
        $user->verified = true;
        $user->save();
    }
}
