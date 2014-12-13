<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function(Blueprint $table)
        {
            $table->increments('id');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('name');
            $table->String('company');
            $table->String('accesscode');
            $table->enum('type', ['admin', 'private']);
            $table->enum('verified', ['no', 'yes'])->default('no');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }

}