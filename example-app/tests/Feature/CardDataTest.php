<?php

namespace Feature;

use Tests\TestCase;

class CardDataTest extends TestCase
{
    public function test_card_add_endpoint(): void
    {
        $this->login();

        $response = $this->post('/api/cards');

        $response->assertStatus(200);
        $responseAsJson = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('id', $responseAsJson);
        $this->assertArrayHasKey('name', $responseAsJson);
        $this->assertArrayHasKey('power', $responseAsJson);
        $this->assertArrayHasKey('image', $responseAsJson);
    }
}
