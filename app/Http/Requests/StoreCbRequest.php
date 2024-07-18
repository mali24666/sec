<?php

namespace App\Http\Requests;

use App\Models\Cb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cb_create');
    }

    public function rules()
    {
        return [
            'trans_cb_fider_number' => [
                'string',
                'required',
                'unique:cbs,trans_cb_fider_number,NULL,id,deleted_at,NULL',
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
            'load_y' => [
                'numeric',
            ],
            'load_b' => [
                'numeric',
            ],
            'load_r' => [
                'numeric',
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
        ];
    }
}