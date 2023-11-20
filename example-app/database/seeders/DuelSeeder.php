<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('duels')->insert([
            'player_id' => 1,
            'opponent_id' => 2,
            'winner_id' => 1,
            'current_round' => 5,
            'status' => 'finished',
            'player_score' => 300,
            'opponent_score' => 200,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('duels')->insert([
            'player_id' => 1,
            'opponent_id' => 2,
            'winner_id' => 2,
            'current_round' => 5,
            'status' => 'finished',
            'player_score' => 200,
            'opponent_score' => 300,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('duels')->insert([
            'player_id' => 2,
            'opponent_id' => 1,
            'winner_id' => 1,
            'current_round' => 5,
            'status' => 'finished',
            'player_score' => 300,
            'opponent_score' => 200,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
