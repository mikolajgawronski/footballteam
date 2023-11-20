<?php

namespace App\Http\Interfaces\User;

use App\Models\Card;
use App\Models\Duel;
use App\Models\User;

interface UserServiceInterface
{
    public function prepareOpponentForDuel(User $user): void;
}
