<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_sei');
            $table->string('name_mei');
            $table->string('nickname');
            $table->integer('gender');
            $table->string('password');
            $table->string('email');
            $table->integer('auth_code')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
//        $table->increments('id', true)->unsigned()->comment('ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}

