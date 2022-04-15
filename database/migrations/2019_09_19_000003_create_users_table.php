<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('email')->unique();
            $table->string('position')->nullable();;

            $table->string('lable')->nullable();
            $table->string('usertype');

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');
            $table->string('status');
            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
    public function key()
    {
        return $this->hasOne(Key::class);
    }

}
