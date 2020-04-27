<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('slug',100)->unique();            
            $table->string('image')->nullable();
            $table->text('describe');
            // $table->mediumText('steps')->nullable();
            // $table->integer('likes')->default(0);
            $table->double('time')->default(0);
            $table->string('persons')->default(0);

            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->bigInteger('category_id')->unsigned();

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');


            // $table->integer('time');
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
        Schema::dropIfExists('recipes');
    }
}
