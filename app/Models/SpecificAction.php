<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'output_indicator',
        'budget'
    ];

    public function performance_target()
    {
        return $this->belongsTo(PerformanceTarget::class);
    }

    public function performanceMeasure()
    {
        return $this->hasMany(PerformanceMeasure::class);
    }

    public function opcr()
    {
        return $this->hasMany(opcr::class);
    }
}
