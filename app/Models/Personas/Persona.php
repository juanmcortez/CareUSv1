<?php

namespace App\Models\Personas;

use App\Models\Personas\Address;
use App\Models\Users\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class Persona extends Model
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
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'language',
        'profile_photo',
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
        'created_at',
        'user',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'birthdate',
        'updated_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthdate' => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];


    /**
     * Return the formated name of the persona
     *
     * @return string
     */
    public function getFormatedNameAttribute()
    {
        if (!empty($this->middle_name)) {
            $formated = $this->last_name . ', ' . $this->first_name . ' ' . strtoupper(substr($this->middle_name, 0, 1)) . '.';
        } else {
            $formated = $this->last_name . ', ' . $this->first_name;
        }
        return $formated;
    }


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


    /**
     * User - Persona model relationship.
     * This function will retrieve the relationship data.
     * There can be only one persona model per user.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'owner_id')->withDefault();
    }


    /**
     * Persona - Address model relationship.
     * This function will retrieve the relationship data.
     * There can be only one address model per persona.
     *
     * @return Address
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'owner_id')->where('owner_type', 'persona');
    }


    /**
     * Persona - Phone model relationship.
     * This function will retrieve the relationship data.
     * There can be only many phone models per persona.
     *
     * @return Phone
     */
    public function phone()
    {
        return $this->hasMany(Phone::class, 'id', 'owner_id')->where('owner_type', 'persona');
    }
}
