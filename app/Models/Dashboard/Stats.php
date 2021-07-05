<?php

namespace App\Models\Dashboard;

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
        'patientsevolX' => 'array',
        'patientsevolY' => 'array',
        'patientgender' => 'array',
        'patientsagegY' => 'array',
        'created_at' => 'datetime:Y-m-d H:i',
    ];
}
