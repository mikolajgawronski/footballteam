<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create();
        User::factory()->create();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.test@mail.com',
            'password' => bcrypt('password'),
            'level' => 1,
            'level_points' => 0,
            'remember_token' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
