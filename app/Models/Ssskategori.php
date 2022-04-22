<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ssskategori extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ssskategoris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        's_kategori_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kategoriSecSsses()
    {
        return $this->hasMany(Sss::class, 'kategori_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
