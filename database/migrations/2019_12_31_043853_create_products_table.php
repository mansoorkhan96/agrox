<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('slug');
            $table->string('details');
            $table->integer('price');
            $table->text('description');
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(0);
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
