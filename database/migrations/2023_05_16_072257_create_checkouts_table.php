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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_number');
            $table->string('name');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('ucapan');
            $table->string('image');
            $table->double('total');
            $table->enum('status', ['pending', 'terima', 'tolak'])->default('pending');
            $table->foreign('user_id')->references('id')->on('users');
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
