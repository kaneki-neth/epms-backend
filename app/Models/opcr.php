<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opcr extends Model
{
    use HasFactory;

    protected $fillable = [
        'accomplishment',
        'rate_quality',
        'rate_effeciency',
        'rate_timeliness',
        'average_score',
        'remarks',
        'date_rated',
        'date_approved'
    ];

    public function specificAction()
    {
        return $this->belongsTo(SpecificAction::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function majorFinalOutput()
    {
        return $this->hasMany(MajorFinalOutput::class);
    }

    public function ipcr()
    {
        return $this->belongsToMany(ipcr::class)->withTimestamps();
    }
}
