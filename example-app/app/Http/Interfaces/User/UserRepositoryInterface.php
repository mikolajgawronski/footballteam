<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getRandomOpponentForUser(int $userId): ?User;
}
