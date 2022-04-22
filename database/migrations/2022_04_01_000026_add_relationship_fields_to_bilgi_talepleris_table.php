<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBilgiTaleplerisTable extends Migration
{
    public function up()
    {
        Schema::table('bilgi_talepleris', function (Blueprint $table) {
            $table->unsignedBigInteger('musteri_kaynagi_id')->nullable();
            $table->foreign('musteri_kaynagi_id', 'musteri_kaynagi_fk_6342718')->references('id')->on('musteri_kaynaklaris');
            $table->unsignedBigInteger('talep_asama_id')->nullable();
            $table->foreign('talep_asama_id', 'talep_asama_fk_6341107')->references('id')->on('musteri_asamalaris');
            $table->unsignedBigInteger('talebi_sorumlusu_id')->nullable();
            $table->foreign('talebi_sorumlusu_id', 'talebi_sorumlusu_fk_6341110')->references('id')->on('users');
            $table->unsignedBigInteger('talebi_alan_id')->nullable();
            $table->foreign('talebi_alan_id', 'talebi_alan_fk_6341109')->references('id')->on('users');
            $table->unsignedBigInteger('talep_statu_id')->nullable();
            $table->foreign('talep_statu_id', 'talep_statu_fk_6341108')->references('id')->on('musteri_statuleris');
        });
    }
}
