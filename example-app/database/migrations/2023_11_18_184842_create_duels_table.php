<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('duels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->foreign("player_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->unsignedBigInteger('opponent_id');
            $table->foreign("opponent_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->unsignedBigInteger('winner_id')->nullable()->default(null);
            $table->foreign("winner_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->integer('current_round')->default(1);
            $table->enum('status', ['active', 'finished'])->default('active');
            $table->string('player_score')->default(0);
            $table->string('opponent_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duels');
    }
};
