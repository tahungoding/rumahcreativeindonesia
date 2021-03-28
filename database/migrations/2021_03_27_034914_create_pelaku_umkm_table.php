<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelakuUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaku_umkm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 20);
            $table->string('nama', 100);
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->string('bidang_usaha', 100);
            $table->string('no_hp',16)->nullable();
            $table->char('provinsi', 2);
            $table->char('kabupaten_kota', 4);
            $table->char('kecamatan', 7);
            $table->char('desa_kelurahan', 10);
            $table->timestamps();
            $table->foreign('provinsi')->references('id')->on('indoregion_provinces');
            $table->foreign('kabupaten_kota')->references('id')->on('indoregion_regencies');
            $table->foreign('kecamatan')->references('id')->on('indoregion_districts')->nullable();
            $table->foreign('desa_kelurahan')->references('id')->on('indoregion_villages')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaku_umkm');
    }
}
