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
        Schema::create('interest_user', function (Blueprint $table) {
            $table->primary(['user_id','interest_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('interest_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('interest_id')->references('id')->on('interests') ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interest_user');
    }
};
