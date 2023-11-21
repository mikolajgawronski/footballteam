<?php

namespace Feature;

use Tests\TestCase;

class UserDataTest extends TestCase
{
    public function test_user_data(): void
    {
        $this->login();

        $response = $this->get('/api/user-data');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'username' => 'John Doe',
            'level' => 1,
            'level_points' => '0/100',
            'new_card_allowed' => true,
        ]);
    }
}
