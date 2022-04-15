<?php

namespace App\Http\Requests;

use App\Publication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePublicationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('publication_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user'       => [
                'required',
            ],
            
            
        ];
    }
}
