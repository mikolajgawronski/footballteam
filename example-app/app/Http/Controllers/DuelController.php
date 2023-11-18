<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuelController extends Controller
{
    public function actionList(): JsonResponse
    {
//        $userId = Auth::user()->id;
        $user = User::query()->first();
        $userId = 1;
        //get all duels where player_id = $userId or opponent_id = $userId
        $duels = Duel::query()->where('player_id', '=', $userId)->orWhere('opponent_id', '=', $userId)->get()->all();

        $data = [];

        foreach ($duels as $duel) {
            $data[] = [
                'id' => $duel->id,
                'player_name' => $user->name === $duel->player->name ? $duel->player->name : $duel->opponent->name,
                'opponent_name' => $user->name === $duel->player->name ? $duel->opponent->name : $duel->player->name,
                'won' => $duel->winner_id === $userId ? 1 : 0,
            ];
        }

        return new JsonResponse($data);
    }

    public function getTimesheetEntriesForUser(int $userId): array
    {
        $timesheetEntries = TimesheetEntry::query()->where('user_id', '=', $userId)->get();

        $groupedTimesheetEntries = $timesheetEntries->groupBy('task_id');

        $result = [];

        foreach ($groupedTimesheetEntries as $taskId => $timesheetEntriesGroup) {
            $result = $this->getGrouppedTimesheetEntries($timesheetEntriesGroup, $taskId, $result);
        }

        return $result;
    }
}
