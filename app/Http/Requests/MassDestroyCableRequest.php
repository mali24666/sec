<?php

namespace App\Http\Requests;

use App\Models\Cable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCableRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cables,id',
        ];
    }
}
