<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function strategicObjective()
    {
        return $this->belongsTo(StrategicObjective::class);
    }

    public function performanceTarget()
    {
        return $this->hasMany(PerformanceTarget::class);
    }
}
