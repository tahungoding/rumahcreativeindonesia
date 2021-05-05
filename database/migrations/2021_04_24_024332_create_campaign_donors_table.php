<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_donors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('anonymous');
            $table->decimal('amount', 16, 2);
            $table->string('message')->nullable();
            $table->foreignId('id_campaign')->references('id')->on('campaigns');
            $table->foreignId('id_campaign_account')->references('id')->on('campaign_accounts');
            $table->string('proof')->nullable();
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
        Schema::dropIfExists('campaign_donors');
    }
}
