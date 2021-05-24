<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->foreignId("user_id")->unsigned(); //REPARTIDOR
      $table->string("fullname");
      $table->string("maps_address");
      $table->date("delivery_date");
      $table->date("amount");
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}
