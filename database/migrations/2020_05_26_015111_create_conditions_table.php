<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->longText('introduction');
            $table->longText('account');
            $table->longText('order');
            $table->longText('conduct');
            $table->longText('submission')->nullable();
            $table->longText('information')->nullable();
            $table->longText('indemnity')->nullable();
            $table->longText('losses');
            $table->longText('promise');
            $table->longText('waiver')->nullable();
            $table->longText('law');
            $table->longText('offer');
            $table->longText('process');
            $table->longText('security');
            $table->longText('warranty');
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
        Schema::dropIfExists('conditions');
    }
}
