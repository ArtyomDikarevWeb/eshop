<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class RefreshTest extends TestCase
{
    private string $url = 'api/auth/refresh';

    public function test_refresh_token_autorized_user(): void
    {
        $token = auth()->login($this->user);
        $response = $this->actingAs($this->user, 'api')
            ->postJson($this->url, headers: ['Authorization' => "Bearer $token"]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['access_token', 'token_type', 'expires_in'],
            ]);
    }

    public function test_refresh_token_unautorized_user(): void
    {
        $response = $this->postJson($this->url);

        $response
            ->assertUnauthorized()
            ->assertJsonStructure(['message']);
    }
}
