<?php
/**
 * Class EmailVerification
 *
 * A Class for email verification emails
 */
namespace App\Mail;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var String
     */
    private $token;

    /**
     * @var String
     */
    private $accountName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $accountName)
    {
        $this->token = $token;
        $this->accountName = $accountName;
    }

    /**
     * Build the message.
     *
     * @return $this
     * @throws ValidationException
     */
    public function build()
    {
        if (!is_null($this->token)) {
            return $this->view('email/verification/email_verify')->with([
                'verify_url' => env('APP_URL') . "/auth/verify/{$this->token}",
                'name' => $this->accountName
            ]);
        }

        $error = ValidationException::withMessages([
            'token' => [
                'No Token Given'
            ],
        ]);

        throw $error;
    }
}
