<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateitemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('projectname');

            $table->string('itemname');

            $table->string('amount')->nullable();
            $table->string('usedby')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
