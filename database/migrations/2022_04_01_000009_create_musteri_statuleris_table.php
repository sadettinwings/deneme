<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusteriStatulerisTable extends Migration
{
    public function up()
    {
        Schema::create('musteri_statuleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('statu_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
