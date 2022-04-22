<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusteriAsamalarisTable extends Migration
{
    public function up()
    {
        Schema::create('musteri_asamalaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asamaadi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
