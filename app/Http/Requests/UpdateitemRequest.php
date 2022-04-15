<?php

namespace App\Http\Requests;

use App\certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatecertificateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'item_id'   => [
                'required',
                'integer',
            ],
            'full_name'  => [
                'required',
            ],
            'services.*'  => [
                'integer',
            ],
            'services'    => [
                'array',
            ],
        ];
    }
}
