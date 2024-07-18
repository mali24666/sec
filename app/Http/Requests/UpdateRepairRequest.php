<?php

namespace App\Http\Requests;

use App\Models\Repair;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRepairRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('repair_edit');
    }

    public function rules()
    {
        return [
            'car_number_id' => [
                'required',
                'integer',
            ],
            'department' => [
                'required',
            ],
            'issue' => [
                'string',
                'nullable',
            ],
            'pic' => [
                'array',
            ],
            'order_by' => [
                'string',
                'nullable',
            ],
            'pic_after' => [
                'array',
            ],
        ];
    }
}
