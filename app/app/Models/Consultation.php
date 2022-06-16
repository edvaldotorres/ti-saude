<?php

namespace App\Models;

class Consultation extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'cons_type',
        'cons_date',
        'cons_time',
    ];

    /**
     * Accessors & Mutators
     */
    public function setConsDateAttribute($value)
    {
        $this->attributes['cons_date'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    /**
     * Relationships
     */
    public function proceedings()
    {
        return $this->belongsToMany(Proceeding::class);
    }
}