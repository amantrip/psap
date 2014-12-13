<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registry', function(Blueprint $table)
        {
            $table->increments('id');
            $table->String('psapid')->unique();
            $table->String('psapname');
            $table->String('state');
            $table->String('county');
            $table->String('city');
            $table->enum('text_911', ['yes', 'no'])->default('no');
            $table->enum('typechange', ['NC', 'O', 'A', 'M', 'S'])->default('NC');
            $table->String('comments');
            $table->integer('changes_owner_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('registry');
    }

}