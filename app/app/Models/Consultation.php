<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;

class Consultation extends BaseModel
{
    use CascadeSoftDeletes;

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
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $cascadeDeletes = [
        'proceedings'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $dates = [
        'cons_date',
        'deleted_at',
    ];

    /**
     * Accessors & Mutators
     */
    public function getConsDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getConsTimeAttribute($value)
    {
        return date('H:i', strtotime($value));
    }

    /**
     * Relationships
     */
    public function proceedings()
    {
        return $this->belongsToMany(Proceeding::class);
    }
}
