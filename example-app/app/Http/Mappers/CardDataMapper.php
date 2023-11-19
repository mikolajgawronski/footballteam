<?php

namespace App\Http\Mappers;

use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Models\Card;

class CardDataMapper implements CardDataMapperInterface
{
    public function getCardsResponseData(Card $card): array
    {
        return [
                'id' => $card->id,
                'name' => $card->name,
                'power' => $card->power,
                'image' => $card->image,
            ];
    }
}
