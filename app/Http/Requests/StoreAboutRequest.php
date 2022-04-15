<?php

namespace App\Http\Requests;

use App\About;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAboutRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            // 'name'       => [
            //     'required',
            // ],
            // 'services.*' => [
            //     'integer',
            // ],
            // 'services'   => [
            //     'array',
            // ],
        ];
    }
}
