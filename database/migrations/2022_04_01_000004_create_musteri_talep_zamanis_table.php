<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusteriTalepZamanisTable extends Migration
{
    public function up()
    {
        Schema::create('musteri_talep_zamanis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('talep_ettigi_zaman')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
