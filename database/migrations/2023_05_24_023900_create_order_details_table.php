<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('category_id');
            $table->foreignId('toko_id');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('toko_id')->references('id')->on('tokos')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
