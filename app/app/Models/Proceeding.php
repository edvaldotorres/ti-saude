<?php

namespace App\Models;

class Proceeding extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'proc_name',
        'proc_price',
    ];
}
