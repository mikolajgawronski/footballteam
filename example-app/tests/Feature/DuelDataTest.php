<?php

namespace Feature;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Models\Duel;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DuelDataTest extends TestCase
{
    private DuelRepositoryInterface $duelRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->duelRepository = $this->app->make(DuelRepositoryInterface::class);
    }

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

        $responseAsJson = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('Message', $responseAsJson);
    }

    public function test_active_duel(): void
    {
        $this->login();

        $response = $this->get('/api/duels/active');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'status' => Duel::STATUS_ACTIVE,
        ]);
    }

    public function test_play_card(): void
    {
        $this->login();

        $response = $this->post('/api/duels/action', [
            'clickable' => true,
            'id' => 1,
            'image' => 'card-11.jpg',
            'name' => 'Łukasz Ostrowski',
            'power' => 63,
        ]);

        $response->assertStatus(200);

        $response->assertJson(['Message' => 'Card played successfully!']);
    }

    public function test_play_card_validation(): void
    {
        $this->login();

        $response = $this->post('/api/duels/action', [
            'data' => 'invalid',
        ]);

        $response->assertStatus(400);
    }
}
