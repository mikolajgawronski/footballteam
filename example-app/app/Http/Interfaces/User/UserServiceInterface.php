<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface UserServiceInterface
{
    public function prepareOpponentForDuel(User $opponent, int $userLevel): void;
    public function grantLevelPointsToWinner(User $winner): void;
}
