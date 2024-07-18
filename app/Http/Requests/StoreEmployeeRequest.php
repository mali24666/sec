<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_create');
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
                // 'min:-4147483648',
                'max:214765324483647',
                'unique:employees,emp',
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
