<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{
    /**
     * Determine if the session is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method()) {
            case 'POST':
                return $this->user()->can('create model');
                break;
            case 'PUT':
            case 'PATCH':
                return $this->user()->can('update model');
                break;
            default:
                return false;
                break;
        }
        return Auth::user()->can('create model');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'column_one' => 'required',
        ];

        switch ($this->method()) {
            case 'POST':
                return array_merge($rules, [
                    'column_two' => 'required|unique:users',
                ]);
                break;
            case 'PUT':
            case 'PATCH':
                return array_merge($rules, [
                    'column_two' => 'required',
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
            'column_two.unique' => 'Column two must be unique.'
        ];
    }
}
