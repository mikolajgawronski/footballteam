<?php

namespace App\Http\Services;

use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Models\Card;
use App\Models\Duel;
use App\Models\User;
use App\Models\UserCard;

class UserService implements UserServiceInterface
{
    public function __construct(private CardServiceInterface $cardService)
    {
    }

    public function prepareOpponentForDuel(User $user, int $playerLevel): void
    {
        $this->cardService->addCardsForOpponent($user, $playerLevel);
    }
}
