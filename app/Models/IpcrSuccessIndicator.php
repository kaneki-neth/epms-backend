<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpcrSuccessIndicator extends Model
{
    use HasFactory;

    protected $fillable = ['success_indicator'];

    public function ipcr()
    {
        return $this->belongsTo(ipcr::class);
    }
}
