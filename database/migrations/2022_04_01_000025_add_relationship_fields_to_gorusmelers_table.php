<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGorusmelersTable extends Migration
{
    public function up()
    {
        Schema::table('gorusmelers', function (Blueprint $table) {
            $table->unsignedBigInteger('musteri_sec_2_id')->nullable();
            $table->foreign('musteri_sec_2_id', 'musteri_sec_2_fk_6342730')->references('id')->on('bilgi_talepleris');
            $table->unsignedBigInteger('gorusen_kisi_id')->nullable();
            $table->foreign('gorusen_kisi_id', 'gorusen_kisi_fk_6340339')->references('id')->on('users');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id', 'kategori_fk_6342774')->references('id')->on('gorusme_kategoris');
        });
    }
}
