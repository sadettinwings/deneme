<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHatirlaticisTable extends Migration
{
    public function up()
    {
        Schema::table('hatirlaticis', function (Blueprint $table) {
            $table->unsignedBigInteger('talep_sec_id')->nullable();
            $table->foreign('talep_sec_id', 'talep_sec_fk_6343006')->references('id')->on('bilgi_talepleris');
            $table->unsignedBigInteger('ilgili_kullanici_id')->nullable();
            $table->foreign('ilgili_kullanici_id', 'ilgili_kullanici_fk_6343010')->references('id')->on('users');
        });
    }
}
