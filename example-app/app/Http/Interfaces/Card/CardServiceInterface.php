<?php

namespace App\Http\Interfaces\Card;

use App\Models\Card;
use App\Models\User;

interface CardServiceInterface
{
    public function addCardToUser(User $user, Card $card): void;
    public function addCardsForOpponent(User $opponent): void;
}
