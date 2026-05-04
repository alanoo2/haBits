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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('achievement_image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('achievement_user', function (Blueprint $table){
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('achievement_id')->constrained('achievements');
            $table->primary(['user_id', 'achievement_id']);

            $table->timestamp('achieved_at')->useCurrent()->nullable();
            $table->boolean('unlocked')->default(false);
        });

        Schema::create('streaks', function (Blueprint $table){
            $table->id();
            $table->integer('current_streak')->default(0);
            $table->integer('longer_streak')->default(0);
            $table->date('last_completed_date')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('habit_id')->constrained('habits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('streaks');
        Schema::dropIfExists('achievement_user');
        Schema::dropIfExists('achievements');
        }
};
