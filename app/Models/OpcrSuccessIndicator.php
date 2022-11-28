<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcrSuccessIndicator extends Model
{
    use HasFactory;

    protected $fillable = ['success_indicator'];

    public function output()
    {
        return $this->belongsTo(Output::class);
    }
}
