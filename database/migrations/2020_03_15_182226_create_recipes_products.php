<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_products', function (Blueprint $table) {
            $table->id();
            // $table->string('name',100)->unique();

            // $table->timestamps();

            $table->bigInteger('recipe_id')->unsigned();

            $table->foreign('recipe_id')
            ->references('id')->on('recipes')
            ->onDelete('cascade');

            $table->bigInteger('product_id')->unsigned();

            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');

            $table->double('count');
            $table->char('unit', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes_products');
    }
}
