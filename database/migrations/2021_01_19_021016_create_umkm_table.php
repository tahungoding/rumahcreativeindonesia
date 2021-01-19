<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_umkm')->references('id')->on('kategori_umkm');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('instagram');
            $table->string('pemilik');
            $table->string('shopee');
            $table->string('tokopedia');
            $table->string('bukalapak');
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
        Schema::dropIfExists('umkm');
    }
}
