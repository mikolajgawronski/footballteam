<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cards')->insert([
            'name' => 'Sergio Donputamadre',
            'power' => 101,
            'image' => 'card-1.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Lewan RS',
            'power' => 69,
            'image' => 'card-2.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Enpi12',
            'power' => 85,
            'image' => 'card-3.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Drivery',
            'power' => 61,
            'image' => 'card-4.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Maximus',
            'power' => 18,
            'image' => 'card-5.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Wylewinho',
            'power' => 32,
            'image' => 'card-6.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Adam76',
            'power' => 108,
            'image' => 'card-7.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Kamyk RS',
            'power' => 79,
            'image' => 'card-8.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'StArSkY',
            'power' => 63,
            'image' => 'card-9.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Nerzhul',
            'power' => 63,
            'image' => 'card-10.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Łukasz Ostrowski',
            'power' => 63,
            'image' => 'card-11.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Sir Bastek',
            'power' => 40,
            'image' => 'card-12.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Sieja',
            'power' => 39,
            'image' => 'card-13.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Sebson',
            'power' => 29,
            'image' => 'card-14.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('cards')->insert([
            'name' => 'Rolnik RS',
            'power' => 87,
            'image' => 'card-15.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
