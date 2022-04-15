<?php

namespace App\Http\Requests;

use App\Supporter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSupporterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
