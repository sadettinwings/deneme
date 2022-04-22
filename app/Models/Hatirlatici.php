<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hatirlatici extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'hatirlaticis';

    protected $dates = [
        'hatirlatma_zamani',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'talep_sec_id',
        'hatirlatma_zamani',
        'baslik',
        'detay',
        'ilgili_kullanici_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function talep_sec()
    {
        return $this->belongsTo(BilgiTalepleri::class, 'talep_sec_id');
    }

    public function getHatirlatmaZamaniAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setHatirlatmaZamaniAttribute($value)
    {
        $this->attributes['hatirlatma_zamani'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function ilgili_kullanici()
    {
        return $this->belongsTo(User::class, 'ilgili_kullanici_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
