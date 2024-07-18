<?php

namespace App\Http\Requests;

use App\Models\Fouse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFouseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fouse_edit');
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
                'unique:fouses,fouse_no,' . request()->route('fouse')->id.',id,deleted_at,NULL',
            ],
        ];
    }
}
