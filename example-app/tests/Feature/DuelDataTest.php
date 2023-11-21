<?php

namespace Feature;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Mappers\CardDataMapper;
use App\Models\Duel;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

use const http\Client\Curl\AUTH_ANY;

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

        if ($this->duelRepository->getActiveDuelForUser(Auth::id())) {
            $response->assertJson(['Message' => 'You already have an active duel! Resuming battle...']);
        } else {
            $response->assertJson(['Message' => 'Duel started!']);
        }
    }

    public function test_active_duel(): void
    {
        $this->login();

        $response = $this->get('/api/duels/active');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'status' => Duel::STATUS_ACTIVE,
            'cards' => [],
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
}
