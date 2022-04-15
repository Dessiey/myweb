<?php

namespace App\Http\Requests;

use App\Publication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePublicationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('publication_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'abouts'       => [
                'required',
            ],
            'user' => [
                'required',
            ],
            
        ];
    }
}
