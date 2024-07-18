<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_create');
    }

    public function rules()
    {
        return [
            'employee_name_id' => [
                'required',
                'integer',
            ],
            'studts' => [
                'required',
            ],
            'course_name_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'file' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
