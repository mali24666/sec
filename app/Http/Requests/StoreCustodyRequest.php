<?php

namespace App\Http\Requests;

use App\Models\Custody;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustodyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('custody_create');
    }

    public function rules()
    {
        return [
            'employee_name_id' => [
                'required',
                'integer',
            ],
            'tools_id' => [
                'required',
                'integer',
            ],
            'number' => [
                'numeric',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
