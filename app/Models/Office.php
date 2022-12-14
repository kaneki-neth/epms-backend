<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

    public function opcr()
    {
        return $this->hasMany(opcr::class);
    }
}
