<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusteriTalepZamani extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'musteri_talep_zamanis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'talep_ettigi_zaman',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function zamanBilgiTalepleris()
    {
        return $this->belongsToMany(BilgiTalepleri::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
