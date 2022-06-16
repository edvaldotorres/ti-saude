<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;

class Patient extends BaseModel
{
    use CascadeSoftDeletes;

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
    protected $cascadeDeletes = [
        'consultations',
        'plans'
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

    /**
     * Relationships
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
}
