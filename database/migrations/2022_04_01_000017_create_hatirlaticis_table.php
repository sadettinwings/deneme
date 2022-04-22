<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHatirlaticisTable extends Migration
{
    public function up()
    {
        Schema::create('hatirlaticis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('hatirlatma_zamani')->nullable();
            $table->string('baslik')->nullable();
            $table->longText('detay')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
