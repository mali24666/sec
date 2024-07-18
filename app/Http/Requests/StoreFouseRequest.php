<?php

namespace App\Http\Requests;

use App\Models\Fouse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFouseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fouse_create');
    }

    public function rules()
    {
        return [
            'minibiler_id' => [
                'required',
                'integer',
            ],
            'fouse_no' => [
                'string',
                'required',
                'unique:fouses,fouse_no,NULL,id,deleted_at,NULL',
            ],
        ];
    }
}
