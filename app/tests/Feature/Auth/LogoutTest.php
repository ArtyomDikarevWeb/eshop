<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LogoutTest extends TestCase
{
    private string $url = 'api/auth/logout';

    public function test_logout_successful(): void
    {
        $token = auth()->login($this->user);
        $response = $this->actingAs($this->user, 'api')
            ->postJson($this->url, headers: ['Authorization' => "Bearer $token"]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['message'],
            ]);
    }

    public function test_logout_while_unauthorized(): void
    {
        $response = $this->postJson($this->url);

        $response
            ->assertUnauthorized()
            ->assertJsonStructure(['message']);
    }
}
