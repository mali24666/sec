<?php

namespace App\Http\Requests;

use App\Models\Box;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBoxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('box_edit');
    }

    public function rules()
    {
        return [
            'box_type' => [
                'required',
            ],
            'box_number' => [
                'string',
                'required',
                'unique:boxes,box_number,' . request()->route('box')->id.',id,deleted_at,NULL',
            ],
            'box_number_2' => [
                'string',
            ],
            'box_number_3' => [
                'string',
            ],
            'box_number_4' => [
                'string',
            ],
            'box_location' => [
                'string',
                'nullable',
            ],
            'box_notes.*' => [
                'integer',
            ],
            'box_notes' => [
                'array',
            ],
            'load' => [
                'numeric',
            ],
            'load_b' => [
                'string',
                'nullable',
            ],
            'load_r' => [
                'string',
                'nullable',
            ],
            'box_photo' => [
                'array',
            ],
        ];
    }
}
