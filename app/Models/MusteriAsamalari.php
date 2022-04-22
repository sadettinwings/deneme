<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusteriAsamalari extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'musteri_asamalaris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'asamaadi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function talepAsamaBilgiTalepleris()
    {
        return $this->hasMany(BilgiTalepleri::class, 'talep_asama_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
