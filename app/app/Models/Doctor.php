<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;

class Doctor extends BaseModel
{
    use CascadeSoftDeletes;
    
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $cascadeDeletes = [
        'consultations'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function specialtie()
    {
        return $this->belongsTo(Specialtie::class);
    }
}
