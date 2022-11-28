<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StratPlan extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function stratPlanType()
    {
        return $this->hasMany(StratPlanType::class);
    }

    public function goal()
    {
        return $this->hasMany(Goal::class);
    }
}
