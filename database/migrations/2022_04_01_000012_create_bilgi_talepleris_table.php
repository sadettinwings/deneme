<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilgiTaleplerisTable extends Migration
{
    public function up()
    {
        Schema::create('bilgi_talepleris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instagram_kullanici_adi')->nullable();
            $table->string('musteri_adi');
            $table->string('telefon');
            $table->string('mail')->nullable();
            $table->date('giris')->nullable();
            $table->date('cikis')->nullable();
            $table->string('tarihler_esnek_mi')->nullable();
            $table->string('kisi_sayisi')->nullable();
            $table->string('tesis_tipi')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('iletisim_tipi')->nullable();
            $table->datetime('iletisim_zamani')->nullable();
            $table->longText('not_ekle')->nullable();
            $table->string('rezervasyon_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
