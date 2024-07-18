<?php

namespace App\Http\Requests;

use App\Models\Custody;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustodyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('custody_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:custodies,id',
        ];
    }
}
