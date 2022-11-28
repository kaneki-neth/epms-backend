<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function opcrSuccessIndicator()
    {
        return $this->hasMany(OpcrSuccessIndicator::class);
    }
}
