<?php

namespace App\Models;

class Doctor extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doc_name',
        'doc_crm',
        'specialtie_id',
    ];
}
