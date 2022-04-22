<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BilgiTalepleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TESIS_TIPI_SELECT = [
        'otel'  => 'Otel',
        'villa' => 'Villa',
    ];

    public const TARIHLER_ESNEK_MI_SELECT = [
        'evet'  => 'Evet',
        'hayir' => 'Hayır',
    ];

    public const ILETISIM_TIPI_SELECT = [
        'arama'    => 'Aranmak İstiyor',
        'whatsapp' => 'Whatsapp',
    ];

    public $table = 'bilgi_talepleris';

    protected $dates = [
        'giris',
        'cikis',
        'iletisim_zamani',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'musteri_kaynagi_id',
        'instagram_kullanici_adi',
        'musteri_adi',
        'telefon',
        'mail',
        'giris',
        'cikis',
        'tarihler_esnek_mi',
        'kisi_sayisi',
        'tesis_tipi',
        'min',
        'max',
        'iletisim_tipi',
        'iletisim_zamani',
        'not_ekle',
        'rezervasyon_no',
        'talep_asama_id',
        'talebi_sorumlusu_id',
        'talebi_alan_id',
        'talep_statu_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        BilgiTalepleri::observe(new \App\Observers\BilgiTalepleriActionObserver());
    }

    public function musteriSec2Gorusmelers()
    {
        return $this->hasMany(Gorusmeler::class, 'musteri_sec_2_id', 'id');
    }

    public function talepSecHatirlaticis()
    {
        return $this->hasMany(Hatirlatici::class, 'talep_sec_id', 'id');
    }

    public function musteri_kaynagi()
    {
        return $this->belongsTo(MusteriKaynaklari::class, 'musteri_kaynagi_id');
    }

    public function zamen()
    {
        return $this->belongsToMany(MusteriTalepZamani::class);
    }

    public function getGirisAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setGirisAttribute($value)
    {
        $this->attributes['giris'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCikisAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCikisAttribute($value)
    {
        $this->attributes['cikis'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function villa_ozelliks()
    {
        return $this->belongsToMany(VillaOzellikleri::class);
    }

    public function villa_turu_secs()
    {
        return $this->belongsToMany(VillaTurleri::class);
    }

    public function bolge_secs()
    {
        return $this->belongsToMany(VillaBolgeleri::class);
    }

    public function getIletisimZamaniAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIletisimZamaniAttribute($value)
    {
        $this->attributes['iletisim_zamani'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function talep_asama()
    {
        return $this->belongsTo(MusteriAsamalari::class, 'talep_asama_id');
    }

    public function talebi_sorumlusu()
    {
        return $this->belongsTo(User::class, 'talebi_sorumlusu_id');
    }

    public function talebi_alan()
    {
        return $this->belongsTo(User::class, 'talebi_alan_id');
    }

    public function talep_statu()
    {
        return $this->belongsTo(MusteriStatuleri::class, 'talep_statu_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
