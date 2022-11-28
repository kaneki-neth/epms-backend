<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function strat_plan()
    {
        return $this->belongsTo(StratPlan::class);
    }

    public function key_function()
    {
        return $this->hasMany(KeyFunction::class);
    }
}
