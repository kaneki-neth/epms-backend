<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorFinalOutput extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function opcr()
    {
        return $this->belongsTo(opcr::class);
    }

    public function coreFunction()
    {
        return $this->hasMany(CoreFunction::class);
    }
}
