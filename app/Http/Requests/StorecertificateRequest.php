<?php

namespace App\Http\Requests;

use App\certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorecertificateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'item_id'   => [
                'required',
                'integer',
            ],
            'student_id' => 'required|unique:certificates|max:10',
            'am_full_name' => 'required|max:45',
            'full_name' => 'required|max:45',
            'cgpa'   => 'required|numeric|between:2,4.00', 
            // 'finish_time' => [
            //     'required',
            //     'date_format:' . config('panel.date_format').config('panel.time_format'),'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            // ],
            'services.*'  => [
                'integer',
            ],
            'services'    => [
                'array',
            ],
        ];
    }
}
