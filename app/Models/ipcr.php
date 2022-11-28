<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ipcr extends Model
{
    use HasFactory;

    protected $fillable = [
        'actual_accomplishment',
        'distribution',
        'rate_quality',
        'rate_efficiency',
        'rate_timeliness',
        'rate_average',
        'average_score',
        'remarks',
        'recommends',
        'date_rated',
        'date_reviewed',
        'date_approved',
    ];

    public function IpcrSuccessIndicator()
    {
        return $this->hasMany(IpcrSuccessIndicator::class);
    }

    public function opcr()
    {
        return $this->belongsToMany(opcr::class)->withTimestamps();
    }
}
