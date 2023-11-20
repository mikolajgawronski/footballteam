<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Card\CardServiceInterface;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Interfaces\Duel\DuelServiceInterface;
use App\Http\Interfaces\User\UserRepositoryInterface;
use App\Http\Interfaces\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DuelController extends Controller
{
    public function __construct(
        private DuelRepositoryInterface $duelRepository,
        private UserRepositoryInterface $userRepository,
        private DuelDataMapperInterface $duelDataMapper,
        private DuelServiceInterface $duelService,
        private CardServiceInterface $cardService,
        private UserServiceInterface $userService,
    ) {}

    public function actionList(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        $duels = $this->duelRepository->getDuelsForUser($user->id);
        $data = $this->duelDataMapper->getDuelsResponseDataForUser($duels, $user);

        return new JsonResponse($data);
    }

    public function actionStartTheDuel(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();

        $opponent = $this->userRepository->getRandomOpponentForUser($user->id);
        $this->userService->prepareOpponentForDuel($opponent, $user->level);
        $duel = $this->duelService->createDuel($user, $opponent);

        return new JsonResponse(['Message' => 'Duel started!']);
    }

    public function actionActiveDuel(): JsonResponse
    {
        /** @var User $user */
        //        $user = Auth::user();
        $user = User::query()->firstOrFail();
        $duel = $this->duelRepository->getActiveDuelForUser($user->id);

        $data = $this->duelDataMapper->getActiveDuelResponseDataForUser($duel);

        return new JsonResponse($data);
    }
}
