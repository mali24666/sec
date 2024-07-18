<?php

namespace App\Http\Requests;

use App\Models\CarMove;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarMoveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_move_create');
    }

    public function rules()
    {
        return [
            'car_no_id' => [
                'required',
                'integer',
            ],
            'file' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
            'date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
