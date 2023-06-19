<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('toko_id');
            $table->foreignId('product_id');
            $table->string('order_number');
            $table->string('name');
            $table->string('no_hp');
            $table->string('kota');
            $table->string('pembayaran');
            $table->string('alamat');
            $table->string('ucapan');
            $table->string('image');
            $table->double('total');
            $table->enum('status', ['menunggu', 'terima', 'tolak'])->default('menunggu');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('checkouts');
    }
}
