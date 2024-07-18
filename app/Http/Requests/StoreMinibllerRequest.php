<?php

namespace App\Http\Requests;

use App\Models\Minibller;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMinibllerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('minibller_create');
    }

    public function rules()
    {
        return [
            'minibller_number' => [
                'string',
                'required',
                'unique:minibllers,minibller_number,NULL,id,deleted_at,NULL',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'rating' => [
                'string',
                'nullable',
            ],
            'manufacturer_serial_no' => [
                'string',
                'nullable',
            ],
            'no_circuits_ici_kva_rating_manuf_ly' => [
                'string',
                'nullable',
            ],
            'no_of_used_circuits' => [
                'string',
                'nullable',
            ],
            'manufacturer' => [
                'string',
                'nullable',
            ],
            'minibllar_notes.*' => [
                'integer',
            ],
            'minibllar_notes' => [
                'array',
            ],
            'area_name_id' => [
                'integer',
            ],
            'load' => [
                'numeric',
            ],
            'load_b' => [
                'string',
                'nullable',
            ],
            'load_y' => [
                'string',
                'nullable',
            ],
        ];
    }
}
