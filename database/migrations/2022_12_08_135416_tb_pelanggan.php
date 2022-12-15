<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan',12)->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('tarif');
            // $table->string('no_telp');
            $table->string('daya');
            $table->string('gardu');
            $table->unsignedBigInteger('user_id');
            $table->foregin('user_id')->references('id')->on('users');
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
        //
    }
};
