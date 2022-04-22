<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gorusmeler extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'gorusmelers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'musteri_sec_2_id',
        'gorusen_kisi_id',
        'not',
        'kategori_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function musteri_sec_2()
    {
        return $this->belongsTo(BilgiTalepleri::class, 'musteri_sec_2_id');
    }

    public function gorusen_kisi()
    {
        return $this->belongsTo(User::class, 'gorusen_kisi_id');
    }

    public function kategori()
    {
        return $this->belongsTo(GorusmeKategori::class, 'kategori_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
