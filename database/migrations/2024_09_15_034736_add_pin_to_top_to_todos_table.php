<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPinToTopToTodosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('todos', function (Blueprint $table) {
      $table->boolean('pin_to_top')->default(false)->after('completed');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('todos', function (Blueprint $table) {
      $table->dropColumn('pin_to_top');
    });
  }
}
