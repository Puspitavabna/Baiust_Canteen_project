<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->date('meal_started_at');
            $table->date('meal_active_until');
            $table->timestamps();
        });

        Schema::table('meal_payments', function($table) {
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_payments');
    }
}
