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
            'user.username'                         => 'required_with:user.email|string|between:6,32|unique:users,username,' . auth()->user()->id . ',id',
            'user.email'                            => 'required_with:user.username|email|unique:users,email,' . auth()->user()->id . ',id',

            'user.persona.first_name'               => 'required_with:user.persona.last_name|string|between:2,32',
            'user.persona.middle_name'              => 'nullable|string|between:2,32',
            'user.persona.last_name'                => 'required_with:user.persona.first_name|string|between:2,32',
            'user.persona.birthdate'                => 'required|date_format:m-d-Y',

            'user.persona.address.street'           => 'nullable|string|between:2,64',
            'user.persona.address.street_extended'  => 'nullable|string|between:2,64',
            'user.persona.address.city'             => 'required_with:user.persona.address.state,user.persona.address.zip|string|between:2,64',
            'user.persona.address.state'            => 'required_with:user.persona.address.city,user.persona.address.zip|string|max:4',
            'user.persona.address.zip'              => 'required_with:user.persona.address.city,user.persona.address.state|string|between:2,16',
            'user.persona.address.country'          => 'nullable|string|max:2',

            'user.persona.phone.intl_code'          => 'required_with:user.persona.phone.area_code,user.persona.phone.prefix,user.persona.phone.line|numeric|digits_between:0,2',
            'user.persona.phone.area_code'          => 'required_with:user.persona.phone.intl_code,user.persona.phone.prefix,user.persona.phone.line,filled|numeric|digits:3',
            'user.persona.phone.prefix'             => 'required_with:user.persona.phone.intl_code,user.persona.phone.area_code,user.persona.phone.line|numeric|digits:3',
            'user.persona.phone.line'               => 'required_with:user.persona.phone.intl_code,user.persona.phone.area_code,user.persona.phone.prefix|numeric|digits:4',
            'user.persona.phone.extension'          => 'nullable|numeric|digits_between:0,2',
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
            'user.username'                         => '<strong>Username</strong>',
            'user.email'                            => '<strong>E-mail</strong>',

            'user.persona.first_name'               => '<strong>First name</strong>',
            'user.persona.middle_name'              => '<strong>Middle name</strong>',
            'user.persona.last_name'                => '<strong>Last name</strong>',
            'user.persona.birthdate'                => '<strong>Birthdate</strong>',

            'user.persona.address.street'           => '<strong>Street</strong>',
            'user.persona.address.street_extended'  => '<strong>Street extended</strong>',
            'user.persona.address.city'             => '<strong>City</strong>',
            'user.persona.address.state'            => '<strong>State</strong>',
            'user.persona.address.zip'              => '<strong>Zip</strong>',
            'user.persona.address.country'          => '<strong>Country</strong>',

            'user.persona.phone.intl_code'          => '<strong>Phone international code</strong>',
            'user.persona.phone.area_code'          => '<strong>Phone area code</strong>',
            'user.persona.phone.prefix'             => '<strong>Phone prefix</strong>',
            'user.persona.phone.line'               => '<strong>Phone line</strong>',
            'user.persona.phone.extension'          => '<strong>Phone extension</strong>',
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
