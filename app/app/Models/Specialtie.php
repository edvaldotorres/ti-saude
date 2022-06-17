<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;

class Specialtie extends BaseModel
{
    use CascadeSoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'spec_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $cascadeDeletes = [
        'doctors'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * Relationships
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
