<?php

namespace App\Models\Users;

use App\Models\Personas\Persona;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'last_login_at',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'updated_at',
        'email_verified_at',
        'persona',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'last_login_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime:Y-m-d H:i',
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
     * Last login at Accesor
     *
     * @param string $value
     * @return string
     */
    public function getLastLoginAtAttribute($value)
    {
        return ucfirst(Carbon::parse($value)->translatedFormat(config('app.updateformat')));
    }


    /**
     * User - Persona model relationship.
     * This function will retrieve the relationship data.
     * There can be only one persona model per user.
     *
     * @return Persona
     */
    public function persona()
    {
        return $this->hasOne(Persona::class, 'owner_id', 'id')->where('owner_type', 'user');
    }
}
