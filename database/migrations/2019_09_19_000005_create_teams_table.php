<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
        
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('position')->nullable();;
            $table->string('photo')->nullable();
            $table->string('fb')->nullable();;
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id');
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
