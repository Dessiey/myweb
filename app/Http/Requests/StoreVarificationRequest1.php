<?php

namespace App\Http\Requests;

use App\Varification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreVarificationRequest1 extends FormRequest
{
    public function authorize()
    {
       // abort_if(Gate::denies('varification_storerequest'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            // 'varcode'       => [
            //     'required',
            // ],
            
        ];
    }
}
