<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('stores', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->foreignId('category_id')->unsigned();
      $table->string('name');
      $table->string('phone');
      $table->string('address');
      $table->string('responsable');
      $table->string('email');
      $table->string('image')->nullable();
      $table->string('status');
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('stores');
  }
}
