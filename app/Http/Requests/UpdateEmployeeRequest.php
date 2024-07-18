<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_edit');
    }

    public function rules()
    {
        return [
            'emp_name' => [
                'string',
                'required',
            ],
            'branch' => [
                'required',
            ],
            'nationlaty' => [
                'string',
                'required',
            ],
            'emp' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:employees,emp,' . request()->route('employee')->id,
            ],
            'id_expire' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'id_photo' => [
                'array',
            ],
            'occupation' => [
                'string',
                'required',
            ],
            'occupation_insite' => [
                'string',
                'nullable',
            ],
        ];
    }
}
