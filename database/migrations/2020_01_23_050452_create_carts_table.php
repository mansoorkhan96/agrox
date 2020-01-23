<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('rowId');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('user_id');
            $table->text('image');
            $table->string('name');
            $table->text('details');
            $table->integer('qty');
            $table->integer('price');
            $table->string('slug');
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
        Schema::dropIfExists('carts');
    }
}
