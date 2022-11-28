<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicObjective extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function strategy()
    {
        return $this->hasMany(Strategy::class);
    }
}
