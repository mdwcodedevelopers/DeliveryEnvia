<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('products', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->foreignId('category_id')->unsigned();
      $table->foreignId('store_id')->unsigned();
      $table->string('code');
      $table->string('name');
      $table->string('description');
      $table->string('price');
      $table->string('image')->nullable();
      $table->string('status');
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
      $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('products');
  }
}
