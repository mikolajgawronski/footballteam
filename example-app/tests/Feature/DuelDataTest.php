<?php

namespace Feature;

use Tests\TestCase;

class DuelDataTest extends TestCase
{
    public function test_duel_list(): void
    {
        $this->login();

        $response = $this->get('/api/duels');

        $response->assertStatus(200);
        $response->assertJsonIsArray();
    }

    public function test_start_the_duel(): void
    {
        $this->login();

        $response = $this->post('/api/duels');

        $response->assertStatus(200);
        $response->assertJson(['Message' => 'Duel started!']);
    }
}
