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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('address');
            $table->foreignId('organizer')->constrained('users');
            $table->foreignId('firstplace')->nullable()->constrained('users');
            $table->foreignId('secondplace')->nullable()->constrained('users');
            $table->foreignId('thirdplace')->nullable()->constrained('users');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('tournaments');
    }
};
