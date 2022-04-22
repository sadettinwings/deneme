<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiTalepleriMusteriTalepZamaniPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bilgi_talepleri_musteri_talep_zamani', function (Blueprint $table) {
            $table->unsignedBigInteger('bilgi_talepleri_id');
            $table->foreign('bilgi_talepleri_id', 'bilgi_talepleri_id_fk_6341098')->references('id')->on('bilgi_talepleris')->onDelete('cascade');
            $table->unsignedBigInteger('musteri_talep_zamani_id');
            $table->foreign('musteri_talep_zamani_id', 'musteri_talep_zamani_id_fk_6341098')->references('id')->on('musteri_talep_zamanis')->onDelete('cascade');
        });
    }
}
