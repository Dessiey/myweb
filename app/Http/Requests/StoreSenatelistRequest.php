<?php

namespace App\Http\Requests;

use App\Senatelist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSenatelistRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('senatelist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'import_file'       => [
                'required',
            ],
            // 'services.*' => [
            //     'integer',
            // ],
            // 'services'   => [
            //     'array',
            // ],
        ];
    }
}
