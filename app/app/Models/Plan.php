<?php

namespace App\Models;

class Plan extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plan_description',
        'plan_telephone',
    ];
}
