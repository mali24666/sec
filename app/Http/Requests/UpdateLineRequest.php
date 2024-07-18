<?php

namespace App\Http\Requests;

use App\Models\Line;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('line_edit');
    }

    public function rules()
    {
        return [
            'line_no' => [
                'string',
                'nullable',
            ],
            'trans.*' => [
                'integer',
            ],
            'trans' => [
                'array',
            ],
            'cts.*' => [
                'integer',
            ],
            'cts' => [
                'array',
            ],
            'boxx_numbers.*' => [
                'integer',
            ],
            'boxx_numbers' => [
                'array',
            ],
            'avr_nos.*' => [
                'integer',
            ],
            'avr_nos' => [
                'array',
            ],
            'auto_selectors.*' => [
                'integer',
            ],
            'auto_selectors' => [
                'array',
            ],
            'section_lazeys.*' => [
                'integer',
            ],
            'section_lazeys' => [
                'array',
            ],
            'rmu_nos.*' => [
                'integer',
            ],
            'rmu_nos' => [
                'array',
            ],
        ];
    }
}
