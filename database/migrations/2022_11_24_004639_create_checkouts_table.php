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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->foreignid('id_laptop');
            $table->foreignid('id_user');
            $table->string('jumlah_barang');
            $table->string('harga');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('nomor_tlp');
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
};
