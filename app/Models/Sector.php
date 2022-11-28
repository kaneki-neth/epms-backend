<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function key_function()
    {
        return $this->belongsTo(KeyFunction::class);
    }

    public function strategicObjective()
    {
        return $this->hasMany(StrategicObjective::class);
    }
}
