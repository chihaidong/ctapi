<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_openid');
            $table->string('user_nickname');
            $table->string('user_zsname');
            $table->string('user_sex');
            $table->string('user_mobile');
            $table->integer('user_role')->default(0);
            $table->integer('user_status')->default(0);
            $table->string('user_headimgurl ');
            $table->string('user_name ');
            $table->string('user_password ');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
