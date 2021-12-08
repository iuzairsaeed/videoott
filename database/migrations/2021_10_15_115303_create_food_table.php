<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('food_category_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('description')->nullable();
            $table->string('videos')->nullable();
            $table->string('images')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('food_category_id')
            ->on('food_categories')
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
        Schema::dropIfExists('food');
    }
}
