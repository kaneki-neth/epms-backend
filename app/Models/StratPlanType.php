<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StratPlanType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function stratPlan()
    {
        return $this->belongsTo(StratPlan::class);
    }
}
