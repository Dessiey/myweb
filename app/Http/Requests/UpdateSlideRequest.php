<?php

namespace App\Http\Requests;

use App\Slide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSlideRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    
}
