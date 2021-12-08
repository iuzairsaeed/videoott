<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('card_no')->nullable();
            $table->string('promocode')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('plan_id')
            ->on('plans')
            ->references('id')
            ->onDelete('cascade');

            $table->foreign('order_id')
            ->on('orders')
            ->references('id')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
