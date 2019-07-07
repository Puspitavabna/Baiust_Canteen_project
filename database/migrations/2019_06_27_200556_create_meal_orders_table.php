<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('breakfast');
            $table->integer('lunch');
            $table->integer('dinner');
            $table->timestamps();
        });


        Schema::table('meal_orders', function($table) {
            $table->integer('user_id');
        });
    }

    /**
     * Rgrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_orders');
    }
}
