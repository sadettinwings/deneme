<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSssesTable extends Migration
{
    public function up()
    {
        Schema::table('ssses', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_sec_id')->nullable();
            $table->foreign('kategori_sec_id', 'kategori_sec_fk_6342626')->references('id')->on('ssskategoris');
        });
    }
}
