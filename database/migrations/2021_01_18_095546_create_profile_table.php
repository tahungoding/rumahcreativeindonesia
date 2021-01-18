<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->text('latar_belakang');
            $table->text('visi');
            $table->text('misi');
            $table->string('model_konsep');
            $table->text('kekuatan');
            $table->text('fokus_wilayah');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('youtube');
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
        Schema::dropIfExists('profile');
    }
}
