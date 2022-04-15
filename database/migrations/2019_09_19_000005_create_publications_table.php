<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('pubyear');
            $table->longText('abstract');
            $table->string('paperlink')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
