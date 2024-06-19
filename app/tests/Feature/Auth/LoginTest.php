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

    public function test_login_successful(): void
    {
        $response = $this->postJson($this->url, [
            'email' => $this->mockEmail,
            'password' => $this->mockPassword,
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['access_token', 'token_type', 'expires_in'],
            ]);
    }

    public function test_email_does_not_exist_in_table(): void
    {
        $response = $this->postJson($this->url, [
            'email' => $this->mockEmailIncorrect,
            'password' => $this->mockPassword,
        ]);

        $response
            ->assertUnauthorized()
            ->assertJsonStructure(['data' => ['error']]);
    }

    public function test_incorrect_password(): void
    {
        $response = $this->postJson($this->url, [
            'email' => $this->mockEmail,
            'password' => $this->mockPasswordIncorrect,
        ]);

        $response
            ->assertUnauthorized()
            ->assertJsonStructure(['data' => ['error']]);
    }
}
