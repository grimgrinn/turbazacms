<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCottegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotteges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->integer('turbaza_id');
            $table->integer('price');
            $table->integer('persons');
            $table->integer('description');
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
        Schema::dropIfExists('cotteges');
    }
}
