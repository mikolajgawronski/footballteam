<?php

namespace App\Http\Interfaces\Card;

use App\Models\Card;

interface CardDataMapperInterface
{
    public function getCardsResponseData(Card $card): array;
    public function prepareCardData(array $userCards): array;
}
