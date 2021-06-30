<?php

namespace App\Models\Patients;

use App\Models\Personas\Persona;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'patID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'externalID',
        'patient_level_accession',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'updated_at',
        'persona',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];


    /**
     * Created at Accesor
     *
     * @param string $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return ucfirst(Carbon::parse($value)->translatedFormat(config('app.updateformat')));
    }


    /**
     * Patient - Persona model relationship.
     * This function will retrieve the relationship data.
     * There can be only one persona model per patient.
     *
     * @return Persona
     */
    public function persona()
    {
        return $this->hasOne(Persona::class, 'owner_id', 'patID')->where('owner_type', 'patient');
    }
}
