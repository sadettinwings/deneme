<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsskategorisTable extends Migration
{
    public function up()
    {
        Schema::create('ssskategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_kategori_adi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
