<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LoginTest extends TestCase
{
    private string $mockEmail = 'testtest@test.com';

    private string $mockPassword = 'password';

    private string $mockEmailIncorrect = 'incorrect_testtest@gmail.com';

    private string $mockPasswordIncorrect = 'incorrect_password';

    private string $url = 'api/auth/login';

    public function testLoginSuccessful(): void
    {
        $response = $this->json('POST', $this->url, [
            'email' => $this->mockEmail,
            'password' => $this->mockPassword,
        ]);

        $response->assertOk();
    }

    public function testLoginFail(): void
    {
        $data = $this->returnFailData();

        $response = $this->json('POST', $this->url, [
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $response->assertUnauthorized();
    }

    private function returnFailData(): array
    {
        $array = [
            [
                'email' => $this->mockEmail,
                'password' => $this->mockPasswordIncorrect,
            ],
            [
                'email' => $this->mockEmailIncorrect,
                'password' => $this->mockPassword,
            ],
            [
                'email' => $this->mockEmailIncorrect,
                'password' => $this->mockPasswordIncorrect,
            ],
        ];

        shuffle($array);

        return $array[0];
    }
}
