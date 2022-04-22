<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sss extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ssses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kategori_sec_id',
        'soru',
        'cevap',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kategori_sec()
    {
        return $this->belongsTo(Ssskategori::class, 'kategori_sec_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
