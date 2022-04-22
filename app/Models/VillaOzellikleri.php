<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VillaOzellikleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'villa_ozellikleris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ozellikadi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function villaOzellikBilgiTalepleris()
    {
        return $this->belongsToMany(BilgiTalepleri::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
