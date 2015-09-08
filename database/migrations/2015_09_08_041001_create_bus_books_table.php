<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_books', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('name',255);
	    $table->string('date',255);
	    $table->string('station',255);
	    $table->string('telephone',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus_books');
    }
}
