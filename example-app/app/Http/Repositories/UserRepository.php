<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Models\Duel;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getRandomOpponentForUser(int $userId): User
    {
        return User::query()
            ->where('id', '!=', $userId)
            ->inRandomOrder()
            ->first();
    }

    public function getOpponentFromDuel(Duel $duel): User
    {
        return User::query()
            ->where('id', '=', $duel->opponent_id)
            ->first();
    }
}
