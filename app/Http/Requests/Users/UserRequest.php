<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.username'             => 'required_with:user.email|string|between:6,32|unique:users,username,' . auth()->user()->id . ',id',
            'user.email'                => 'required_with:user.username|email|unique:users,email,' . auth()->user()->id . ',id',

            'persona.first_name'        => 'required_with:persona.last_name|string|between:2,32',
            'persona.middle_name'       => 'nullable|string|between:2,32',
            'persona.last_name'         => 'required_with:persona.first_name|string|between:2,32',
            'persona.birthdate.month'   => 'required|integer|between:1,12',
            'persona.birthdate.day'     => 'required|integer|between:1,31',
            'persona.birthdate.year'    => 'required|integer|between:1900,2900',
            'persona.language'          => 'nullable|string|max:2',
            'persona.profile_photo'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048',

            'address.street'            => 'nullable|string|between:2,64',
            'address.street_extended'   => 'nullable|string|between:2,64',
            'address.city'              => 'required_with:address.state,address.zip|string|between:2,64',
            'address.state'             => 'required_with:address.city,address.zip|string|max:4',
            'address.zip'               => 'required_with:address.city,address.state|string|between:2,16',
            'address.country'           => 'nullable|string|max:2',

            'phone.intl_code'           => 'required_with:phone.area_code,phone.prefix,phone.line|numeric|digits_between:0,2',
            'phone.area_code'           => 'required_with:phone.intl_code,phone.prefix,phone.line|numeric|digits:3',
            'phone.prefix'              => 'required_with:phone.intl_code,phone.area_code,phone.line|numeric|digits:3',
            'phone.line'                => 'required_with:phone.intl_code,phone.area_code,phone.prefix|numeric|digits:4',
            'phone.extension'           => 'nullable|numeric|digits_between:0,2',
        ];
    }
}
