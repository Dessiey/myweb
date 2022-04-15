<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatecontactussTable extends Migration
{
    public function up()
    {
        Schema::create('contactuss', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('subject');

            $table->string('email');
            $table->string('messege');
            $table->string('status')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
