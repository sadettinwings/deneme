<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSssesTable extends Migration
{
    public function up()
    {
        Schema::create('ssses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('soru')->nullable();
            $table->longText('cevap')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
