<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyFunction extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function sector()
    {
        return $this->hasMany(Sector::class);
    }
}
