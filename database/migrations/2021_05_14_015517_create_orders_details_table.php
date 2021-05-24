<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDetailsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('orders_details', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->foreignId("order_id")->unsigned();
      $table->foreignId("product_id")->unsigned();
      $table->string('name');
      $table->integer('quantity');
      $table->decimal('price',20,2);
      $table->decimal('subtotal',20,2);
      $table->decimal('amount',20,2);
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('orders_details');
  }
}
