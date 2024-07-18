<?php

namespace App\Http\Requests;

use App\Models\Car;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_create');
    }

    public function rules()
    {
        return [
            'car_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'moror_number' => [
                'string',
                'nullable',
            ],
            'estmara_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tameen' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'factory' => [
                'string',
                'nullable',
            ],
            'modol' => [
                'string',
                'nullable',
            ],
            'check_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
