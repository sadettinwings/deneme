<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusteriStatuleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'musteri_statuleris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'statu_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function talepStatuBilgiTalepleris()
    {
        return $this->hasMany(BilgiTalepleri::class, 'talep_statu_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
