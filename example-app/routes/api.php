<?php

use App\Http\Controllers\Api\Authorization\LoginController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\DuelController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

//Route::group(['middleware' => ['auth:sanctum']], function () {

    //START THE DUEL
//    Route::post('duels', function (Request $request) {
//       return response()->json();
//    });
    Route::post('duels', [DuelController::class, 'actionStartTheDuel'])->name('duel.start');

    //CURRENT GAME DATA
//    Route::get('duels/active', function (Request $request) {
//        return [
//            'round' => 4,
//            'your_points' => 260,
//            'opponent_points' => 100,
//            'status' => 'active',
//            'cards' => config('game.cards'),
//        ];
//    });

    Route::get('duels/active', [DuelController::class, 'actionActiveDuel'])->name('duel.active');

    //User has just selected a card
    Route::post('duels/action', function (Request $request) {
        return response()->json();
    });

    //DUELS HISTORY
    Route::get('duels', [DuelController::class, 'actionList'])->name('duel.list');

    //CARDS
    Route::post('cards', [CardController::class, 'actionAddNewCard'])->name('card.list');

    //USER DATA
    Route::get('user-data', [UserController::class, 'actionUserData'])->name('user.data');
//});
