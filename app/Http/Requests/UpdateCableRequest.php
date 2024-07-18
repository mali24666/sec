<?php

namespace App\Http\Requests;

use App\Models\Cable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cable_edit');
    }

    public function rules()
    {
        return [
            'cable_size' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
