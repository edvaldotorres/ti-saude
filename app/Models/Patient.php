<?php

namespace App\Models;

class Patient extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pat_code',
        'pat_name',
        'pat_birth',
    ];

    /**
     * Accessors & Mutators
     */
    public function setPatBirthAttribute($value)
    {
        $this->attributes['pat_birth'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }
}
