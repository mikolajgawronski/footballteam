<?php

namespace Unit;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    private UserRepositoryInterface $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->app->make(UserRepositoryInterface::class);
    }

    public function test_that_user_repository_returns_different_user_than_logged_in(): void
    {
        $this->login();
        $user = Auth::user();

        $opponent = $this->userRepository->getRandomOpponentForUser($user->id);

        $this->assertNotEquals($user->id, $opponent->id);
    }
}
