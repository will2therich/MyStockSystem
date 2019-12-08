<?php


namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;
use Tests\TestCase;

class AbstractTestCase extends TestCase
{
    use DatabaseTransactions;

    protected $loggedInUser;
    protected $apiAccessKey;

    protected $connectionsToTransact = [    'pgsql'];

    protected function assertDontSeeJson(array $data, TestResponse $response)
    {
        $responseArray = $response->decodeResponseJson();
        $printableResponse = print_r($responseArray, 1);
        foreach ($data as $key) {
            PHPUnit::assertArrayNotHasKey(
                $key,
                $responseArray,
                "Failed asserting that [$key] is not contained in $printableResponse"
            );
        }
    }

    /**
     * Log in as a normal user
     */
    protected function logInAsUser() {
        /** @var User $user */
        $user = factory(User::class)->create([
            'password' => 'password'
        ]);

        $postData = [
            'username' => $user->username,
            'password' => 'password'
        ];

        $loginResponse = $this->json('POST', '/api/auth/login', $postData)->decodeResponseJson();

        $this->loggedInUser = $user;
        $this->apiAccessKey = $loginResponse['access_token'];
    }


    /**
     * Makes a request with the required auth header
     *
     * @param $method
     * @param $url
     * @param array $data
     * @param boolean $admin - Should we perform the request as an admin?
     * @return TestResponse
     */
    protected function makeRequestWithAuth(
        $method,
        $url,
        $data = []
    ) {
        // If we have already been logged in than this is not needed
        $this->logInAsUser();

        return $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->apiAccessKey,
            'Accept' => 'Application/Json'
        ])->json(
            $method,
            $url,
            $data
        );
    }

    public function assertArrayContainsArray($needle, $haystack) {
        foreach ($haystack as $entry) {
            if (
                is_array($entry) &&
                $entry === $needle
            ) {
                return true;
            }
        }
        return false;
    }
}
