<?php

namespace Unit;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserServiceInterface $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserServiceInterface::class);
    }

    public function test_that_user_repository_returns_different_user_than_logged_in(): void
    {
        $this->login();
        $user = Auth::user();

        $pointsBefore = $user->level_points;

        $this->userService->grantLevelPointsToWinner($user);

        $pointsAfter = $user->level_points;

        $this->assertEquals($pointsBefore + User::POINTS_AWARDED_PER_WIN, $pointsAfter);
    }
}
