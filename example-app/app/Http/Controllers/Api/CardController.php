<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Card\CardDataMapperInterface;
use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Mappers\CardDataMapper;
use App\Http\Repositories\CardRepository;
use App\Http\Services\CardService;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class CardController extends Controller
{
    public function __construct(
        private CardRepositoryInterface $cardRepository,
        private CardServiceInterface $cardService,
        private CardDataMapperInterface $cardDataMapper,
    ) {}

    public function actionAddNewCard(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        //get cards for user
        $card = $this->cardRepository->getRandomCard();
        $this->cardService->addCardToUser($user, $card);

        $data = $this->cardDataMapper->getCardsResponseData($card);

        return new JsonResponse($data);
    }
}
