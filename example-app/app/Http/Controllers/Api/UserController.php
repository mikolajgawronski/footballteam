<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Card\CardRepositoryInterface;
use App\Http\Interfaces\User\UserDataMapperInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private CardRepositoryInterface $cardRepository,
        private UserDataMapperInterface $userDataMapper,
    ) {}

    public function actionUserData(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        //get cards for user
        $cards = $this->cardRepository->getCardsForUser($user->id);
        $data = $this->userDataMapper->getUserResponseData($cards, $user);

        return new JsonResponse($data);
    }
}
