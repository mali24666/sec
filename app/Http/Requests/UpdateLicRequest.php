<?php

namespace App\Http\Requests;

use App\Models\Lic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lic_edit');
    }

    public function rules()
    {
        return [
            'license_no' => [
                'string',
                'nullable',
            ],
            'esnad' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'datestary' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_end' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'longtude' => [
                'string',
                'nullable',
            ],
            'path' => [
                'array',
            ],
            'license_pic' => [
                'array',
            ],
            'e_length' => [
                'nullable',
                'string',
            ],
            't_length' => [
                'nullable',
                'string',
            ],
            'wide' => [
                'string',
                'nullable',
            ],
            'deep' => [
                'string',
                'nullable',
            ],
            'order_pic' => [
                'array',
            ],
            'order_reject' => [
                'array',
            ],
            'naseg_no' => [
                'nullable',
                'integer',
            ],
            'task_number' => [
                'string',
                'nullable',
            ],

        ];
    }
}
