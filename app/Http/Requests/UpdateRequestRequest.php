<?php

namespace App\Http\Requests;

use App\Request;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
            ],
            'services.*' => [
                'integer',
            ],
            'services'   => [
                'array',
            ],
        ];
    }
}
