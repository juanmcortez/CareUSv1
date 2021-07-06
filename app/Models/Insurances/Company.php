<?php

namespace App\Models\Insurances;

use App\Models\Personas\Address;
use App\Models\Personas\Phone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'insID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'name',
        'marketing_name',
        'parent_organization',
        'typeof_organization',
        'contract_effective_date',
        'contract_termination_date',
        'payer_type',
        'payer_id',
        'eligbility_payer_id',
        'x12_partner',
        'eligbility_x12_partner',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'address',
        'phone',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'contract_effective_date',
        'contract_termination_date',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'contract_effective_date' => 'date:Y-m-d',
        'contract_termination_date' => 'date:Y-m-d',
    ];


    /**
     * contract_effective_date Accesor
     *
     * @param string $value
     * @return string
     */
    public function getContractEffectiveDateAttribute($value)
    {
        return ($value === null) ? null : ucfirst(Carbon::parse($value)->translatedFormat(config('app.dateformat')));
    }


    /**
     * contract_termination_date Accesor
     *
     * @param string $value
     * @return string
     */
    public function getContractTerminationDateAttribute($value)
    {
        return ($value === null) ? null : ucfirst(Carbon::parse($value)->translatedFormat(config('app.dateformat')));
    }


    /**
     * Company - Address model relationship.
     * This function will retrieve the relationship data.
     * There can be only one address model per company.
     *
     * @return Address
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'owner_id', 'insID')->where('owner_type', 'insurance');
    }


    /**
     * Company - Phone model relationship.
     * This function will retrieve the relationship data.
     * There can be only one phone model per company.
     *
     * @return Phone
     */
    public function phone()
    {
        return $this->hasOne(Phone::class, 'owner_id', 'insID')->where('owner_type', 'insurance');
    }
}
