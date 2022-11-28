<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreFunction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function mfo()
    {
        return $this->belongsTo(MajorFinalOutput::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
