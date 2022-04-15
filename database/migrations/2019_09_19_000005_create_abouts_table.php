<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('strategies')->nullable();;
            $table->longText('comprises')->nullable();;
            $table->longText('vision')->nullable();;
            $table->longText('mission')->nullable();
            $table->longText('establishment')->nullable();
            $table->string('happyclients')->nullable();
            $table->string('projects')->nullable();
            $table->string('publication')->nullable();
            $table->string('experiance')->nullable();
            $table->string('awards')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
