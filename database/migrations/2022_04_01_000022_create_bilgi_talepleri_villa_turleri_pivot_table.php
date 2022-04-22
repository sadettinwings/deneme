<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiTalepleriVillaTurleriPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bilgi_talepleri_villa_turleri', function (Blueprint $table) {
            $table->unsignedBigInteger('bilgi_talepleri_id');
            $table->foreign('bilgi_talepleri_id', 'bilgi_talepleri_id_fk_6342681')->references('id')->on('bilgi_talepleris')->onDelete('cascade');
            $table->unsignedBigInteger('villa_turleri_id');
            $table->foreign('villa_turleri_id', 'villa_turleri_id_fk_6342681')->references('id')->on('villa_turleris')->onDelete('cascade');
        });
    }
}
