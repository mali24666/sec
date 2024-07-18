<?php

namespace App\Http\Requests;

use App\Models\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_edit');
    }

    public function rules()
    {
        return [
            'station_no' => [
                'string',
                'required',
            ],
            'neighborhood' => [
                'string',
                'nullable',
            ],
            'coordinates' => [
                'string',
                'required',
            ],
            'lamp_befor' => [
                'array',
            ],
            'fan_befor' => [
                'array',
            ],
            'lamp_after' => [
                'array',
            ],
            'fan_after' => [
                'array',
            ],
        ];
    }
}
