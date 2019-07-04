<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meal_rate_name');
            $table->integer('breakfast_rate');
            $table->string('breakfast_menu');
            $table->integer('lunch_rate');
            $table->string('lunch_menu');
            $table->integer('dinner_rate');
            $table->string('dinner_menu');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::table('meal_orders', function($table) {
            $table->integer('meal_rate_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_rates');
    }
}
