<?php

namespace App\Models\Personas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
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
        'intl_code',
        'area_code',
        'prefix',
        'line',
        'extension',
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
        'persona',
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
     * When updating address, touch parent update_at column
     *
     * @var array
     */
    protected $touches = [
        'persona'
    ];


    /**
     * Persona - Phone model relationship.
     * This function will retrieve the relationship data.
     * There can be only one phone model per persona.
     *
     * @return Persona
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id', 'owner_id')->withDefault();
    }
}
