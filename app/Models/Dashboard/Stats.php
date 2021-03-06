<?php

namespace App\Models\Dashboard;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stats extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'totalpatients',
        'patsevolXInit',
        'patientsevolX',
        'patientsevolY',
        'patientgender',
        'patientsagegY',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'deleted_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'totalpatients' => 'integer',
        'patsevolXInit' => 'integer',
        'patientsevolX' => 'array',
        'patientsevolY' => 'array',
        'patientgender' => 'array',
        'patientsagegY' => 'array',
        'updated_at'    => 'datetime:Y-m-d H:i',
    ];


    /**
     * Updated at Accesor
     *
     * @param string $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return ucfirst(Carbon::parse($value)->translatedFormat(config('app.updateformat')));
    }
}
