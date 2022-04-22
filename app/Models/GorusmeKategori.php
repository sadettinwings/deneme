<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GorusmeKategori extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'gorusme_kategoris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kategori',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kategoriGorusmelers()
    {
        return $this->hasMany(Gorusmeler::class, 'kategori_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
