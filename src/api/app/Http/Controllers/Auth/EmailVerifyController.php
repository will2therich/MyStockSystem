<?php
/**
 * Controller for verifying emails
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Services\Verification\EmailVerificationService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;

class EmailVerifyController extends Controller
{

    protected $username;

    /**
     * @var EmailVerificationService
     */
    private $emailVerificationService;

    /**
     * Create a new EmailVerifyController instance.
     *
     * @return void
     */
    public function __construct(EmailVerificationService $emailVerificationService)
    {
        $this->middleware('auth:api', ['except' => ['verify']]);
        $this->emailVerificationService = $emailVerificationService;
    }

    /**
     * Verify an email by token
     *
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify($token)
    {
        $this->emailVerificationService->verifyAccount($token);

        return new JsonResponse([], 204);
    }
}
