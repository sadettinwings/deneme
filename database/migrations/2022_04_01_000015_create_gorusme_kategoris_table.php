<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGorusmeKategorisTable extends Migration
{
    public function up()
    {
        Schema::create('gorusme_kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kategori')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
