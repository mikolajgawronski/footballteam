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

    private function setOpponentLevelToMatchUsers(User $opponent, int $userLevel): void
    {
        $opponent->level = $userLevel;
        $opponent->save();
    }
}
