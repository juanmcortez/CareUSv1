<?php

namespace App\Models\Personas;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'owner_type',
        'street',
        'street_extended',
        'city',
        'state',
        'zip',
        'country',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'owner_id',
        'owner_type',
        'deleted_at',
        'updated_at',
        'created_at',
        'user',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    /**
     * Persona - Address model relationship.
     * This function will retrieve the relationship data.
     * There can be only one address model per persona.
     *
     * @return Address
     */
    public function address()
    {
        return $this->belongsTo(Persona::class, 'id', 'owner_id')->withDefault();
    }
}
