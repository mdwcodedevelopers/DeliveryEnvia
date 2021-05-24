<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('roles', function (Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->enum('status', [0, 1])->default(1); //0desactivado, 1activado
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
    Schema::dropIfExists('roles');
  }
}