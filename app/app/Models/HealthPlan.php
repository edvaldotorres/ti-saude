<?php

namespace App\Models;

class HealthPlan extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hp_description',
        'hp_telephone',
    ];
}
