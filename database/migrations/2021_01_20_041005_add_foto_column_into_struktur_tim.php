<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoColumnIntoStrukturTim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('struktur_tim', function (Blueprint $table) {
            $table->string('foto')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('struktur_tim', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
}
