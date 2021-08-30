<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('animals', function (Blueprint $table) {
      $table->id();
      $table->foreignId('adotante_id')->nullable()->constrained()
        ->onDelete('cascade')->onUpdate('cascade');
      $table->string('nome');
      $table->date('nascimento');
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
    Schema::dropIfExists('animals');
  }
}
