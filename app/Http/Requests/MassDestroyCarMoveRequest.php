<?php

namespace App\Http\Requests;

use App\Models\CarMove;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarMoveRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('car_move_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:car_moves,id',
        ];
    }
}
