<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function coreFunction()
    {
        return $this->belongsTo(CoreFunction::class);
    }

    public function output()
    {
        return $this->hasMany(Output::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
