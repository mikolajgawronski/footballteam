<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Duel\DuelDataMapperInterface;
use App\Http\Interfaces\Duel\DuelRepositoryInterface;
use App\Http\Mappers\DuelDataMapper;
use App\Http\Repositories\DuelRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DuelController extends Controller
{
    public function __construct(
        private DuelRepositoryInterface $duelRepository,
        private DuelDataMapperInterface $duelDataMapper,
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
}
