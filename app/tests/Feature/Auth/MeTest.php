<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class MeTest extends TestCase
{
    private string $url = 'api/auth/me';

    public function test_logged_user_info_returns(): void
    {
        $response = $this->actingAs($this->user, 'api')
            ->postJson($this->url);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['id', 'email', 'username', 'phone', 'name', 'surname', 'last_name'],
            ]);
    }

    public function test_unautorized_user_info_returns(): void
    {
        $response = $this->postJson($this->url);

        $response
            ->assertUnauthorized()
            ->assertJsonStructure(['message']);
    }
}
