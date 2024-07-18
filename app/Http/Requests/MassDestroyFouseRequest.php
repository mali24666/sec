<?php

namespace App\Http\Requests;

use App\Models\Fouse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFouseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fouse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fouses,id',
        ];
    }
}
