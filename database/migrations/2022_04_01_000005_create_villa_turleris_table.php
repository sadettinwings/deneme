<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillaTurlerisTable extends Migration
{
    public function up()
    {
        Schema::create('villa_turleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tur_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
