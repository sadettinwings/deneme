<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiTalepleriVillaBolgeleriPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bilgi_talepleri_villa_bolgeleri', function (Blueprint $table) {
            $table->unsignedBigInteger('bilgi_talepleri_id');
            $table->foreign('bilgi_talepleri_id', 'bilgi_talepleri_id_fk_6342682')->references('id')->on('bilgi_talepleris')->onDelete('cascade');
            $table->unsignedBigInteger('villa_bolgeleri_id');
            $table->foreign('villa_bolgeleri_id', 'villa_bolgeleri_id_fk_6342682')->references('id')->on('villa_bolgeleris')->onDelete('cascade');
        });
    }
}
