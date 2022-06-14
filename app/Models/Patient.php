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
        'pat_name',
        'pat_birth',
        'pat_telephone',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'pat_telephone' => 'array',
    ];

    /**
     * Accessors & Mutators
     */
    public function setPatBirthAttribute($value)
    {
        $this->attributes['pat_birth'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }
}
