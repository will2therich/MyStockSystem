<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    private $emailValidated = false;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $name = $this->ask('What is the users name');

        // While we do not have a valid email continue this loop
        while (!$this->emailValidated) {
            $email = $this->ask('What is the users email');
            // Use FILTER_VALIDATE_EMAIL to see if email is theoretically valid.
            if (filter_var($email, FILTER_VALIDATE_EMAIL )) {
                $this->emailValidated = true;
            } else {
                $this->error('The email provided is not a valid email, please try again');
            }
        }

        $password = $this->output->askHidden('Please set a password');

        $data = [
            'name' => $name,
            'username' => $email,
            'email' => $email,
            'password' => $password,
        ];

        User::create($data);
    }
}
