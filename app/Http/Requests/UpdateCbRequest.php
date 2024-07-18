<?php

namespace App\Http\Requests;

use App\Models\Cb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cb_edit');
    }

    public function rules()
    {
        return [
            'trans_cb_fider_number' => [
                'string',
                'required',
                'unique:cbs,trans_cb_fider_number,' . request()->route('cb')->id.',id,deleted_at,NULL',
            ],
            'minbilars.*' => [
                'integer',
            ],
            'minbilars' => [
                'array',
            ],
            'temperature' => [
                'string',
                'nullable',
            ],
            'temperature_refrence' => [
                'string',
                'nullable',
            ],
            'temperature_picture' => [
                'array',
            ],
            'refrence_pic' => [
                'array',
            ],
             'load_y' => [
                'numeric',
            ],
            'load_b' => [
                'numeric',
            ],
            'load_r' => [
                'numeric',
            ],
        ];
    }
}