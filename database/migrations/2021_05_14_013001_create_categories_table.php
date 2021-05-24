<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('categories', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->string('code');
      $table->string('name');
      $table->string('description');
      $table->string('image')->nullable();
      $table->enum('type', [1, 2]); //1TIENDAS 2PRODUCTOS
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
    Schema::dropIfExists('categories');
  }
}
