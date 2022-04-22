<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGorusmelersTable extends Migration
{
    public function up()
    {
        Schema::create('gorusmelers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('not')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
