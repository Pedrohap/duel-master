<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casual_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenger')->constrained('users')->unique();
            $table->foreignId('challengee')->constrained('users')->unique();
            $table->foreignId('winner')->nullable()->constrained('users');
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_drawn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casual_matches');
    }
};
