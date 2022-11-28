<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'birthdate',
        'sex',
        'contact_number',
        'address',
        'email',
        'password',

    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class)->withTimestamps();
    }

    public function designations()
    {
        return $this->belongsToMany(Designation::class)->withTimestamps();
    }

    public function opcr()
    {
        return $this->hasMany(opcr::class);
    }
}
