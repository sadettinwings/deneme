<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillaBolgelerisTable extends Migration
{
    public function up()
    {
        Schema::create('villa_bolgeleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bolgeadi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
