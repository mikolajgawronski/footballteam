<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function __construct(private CardServiceInterface $cardService) {}

    public function prepareOpponentForDuel(User $opponent, int $userLevel): void
    {
        $this->setOpponentLevelToMatchUsers($opponent, $userLevel);
        $this->cardService->addCardsForOpponent($opponent);
    }

    public function grantLevelPointsToWinner(User $winner): void
    {
        $winner->level_points += User::POINTS_AWARDED_PER_WIN;
        $winner->save();
    }

    private function setOpponentLevelToMatchUsers(User $opponent, int $userLevel): void
    {
        $opponent->level = $userLevel;
        $opponent->save();
    }
}
