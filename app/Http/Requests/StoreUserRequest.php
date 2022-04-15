<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
                'min:5',
                'max:50',
            ],
            'position'     => [
                'required',
                'min:5',
                'max:50',
            ],
            'lable'     => [
                'required',
                'min:5',
                'max:50',
            ],
            'email'    => [
                'required',
                'unique:users',
                'min:5',
                'max:25',
                'regex:/^.+@.+$/i'
            ],
           
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
        ];
    }
}
