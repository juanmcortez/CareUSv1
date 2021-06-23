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
            'persona.birthdate'         => 'required|date_format:"' . config('app.dateformat') . '"',
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


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user.username'             => '<strong>Username</strong>',
            'user.email'                => '<strong>E-mail</strong>',

            'persona.first_name'        => '<strong>First name</strong>',
            'persona.middle_name'       => '<strong>Middle name</strong>',
            'persona.last_name'         => '<strong>Last name</strong>',
            'persona.birthdate'         => '<strong>Birthdate</strong>',
            'persona.profile_photo'     => '<strong>Profile photo</strong>',

            'address.street'            => '<strong>Street</strong>',
            'address.street_extended'   => '<strong>Street extended</strong>',
            'address.city'              => '<strong>City</strong>',
            'address.state'             => '<strong>State</strong>',
            'address.zip'               => '<strong>Zip</strong>',
            'address.country'           => '<strong>Country</strong>',

            'phone.intl_code'           => '<strong>Phone international code</strong>',
            'phone.area_code'           => '<strong>Phone area code</strong>',
            'phone.prefix'              => '<strong>Phone prefix</strong>',
            'phone.line'                => '<strong>Phone line</strong>',
            'phone.extension'           => '<strong>Phone extension</strong>',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
