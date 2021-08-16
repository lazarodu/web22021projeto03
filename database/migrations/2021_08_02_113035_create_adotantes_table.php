<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdotantesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('adotantes', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()
        ->onDelete('cascade')->onUpdate('cascade');
      $table->string('documento');
      $table->string('endereco');
      $table->string('numero');
      $table->string('complemento');
      $table->string('bairro');
      $table->string('estado');
      $table->string('cidade');
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
    Schema::dropIfExists('adotantes');
  }
}
