<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceTarget extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function stratey()
    {
        return $this->belongsTo(Strategy::class);
    }

    public function specificAction()
    {
        return $this->hasMany(SpecificAction::class);
    }
}
