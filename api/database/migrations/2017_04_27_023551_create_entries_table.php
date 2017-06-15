<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('entries', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('entry_id')->unsigned();
          $table->foreign('entry_id')->references('id')->on('entries_list')->onDelete('cascade');
          $table->integer('item_id')->unsigned();
          $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
          $table->integer('machine_id')->unsigned();
          $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
          $table->string('description');
          $table->integer('quantity');
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
        Schema::dropIfExists('entries');
    }
}
