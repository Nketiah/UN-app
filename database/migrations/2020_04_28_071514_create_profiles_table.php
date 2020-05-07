<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('disability')->nullable();
            $table->string('occupation')->nullable();
            $table->string('marital')->nullable();
            $table->string('religion')->nullable();
            $table->string('joined')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
