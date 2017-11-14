<?php

namespace App\Http\Requests;

use Auth;
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
        switch ($this->method()) {
            case 'POST':
                return $this->user()->can('create user');
                break;
            case 'PUT':
            case 'PATCH':
                return $this->user()->can('update user');
                break;
            default:
                return false;
                break;
        }
        return Auth::user()->can('create user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
        ];

        switch ($this->method()) {
            case 'POST':
                return array_merge($rules, [
                    'email' => 'required|unique:users',
                    'password' => 'required|confirmed'
                ]);
                break;
            case 'PUT':
            case 'PATCH':
                return array_merge($rules, [
                    'email' => 'required',
                    'password' => 'nullable|confirmed'
                ]);
                break;
            default:
                return $rules;
                break;
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.confirmed' => 'Passwords do no match.'
        ];
    }
}
