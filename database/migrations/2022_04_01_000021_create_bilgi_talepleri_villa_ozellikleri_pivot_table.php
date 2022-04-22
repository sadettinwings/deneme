<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiTalepleriVillaOzellikleriPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bilgi_talepleri_villa_ozellikleri', function (Blueprint $table) {
            $table->unsignedBigInteger('bilgi_talepleri_id');
            $table->foreign('bilgi_talepleri_id', 'bilgi_talepleri_id_fk_6342680')->references('id')->on('bilgi_talepleris')->onDelete('cascade');
            $table->unsignedBigInteger('villa_ozellikleri_id');
            $table->foreign('villa_ozellikleri_id', 'villa_ozellikleri_id_fk_6342680')->references('id')->on('villa_ozellikleris')->onDelete('cascade');
        });
    }
}
