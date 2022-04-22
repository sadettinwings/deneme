<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VillaBolgeleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'villa_bolgeleris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bolgeadi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function bolgeSecBilgiTalepleris()
    {
        return $this->belongsToMany(BilgiTalepleri::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
