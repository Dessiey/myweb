<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
        
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('imageid')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
