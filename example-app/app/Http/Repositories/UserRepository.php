<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Duel\DuelRepositoryInterface;
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
}
