<?php

namespace App\Http\Requests;

use App\Models\BoxNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBoxNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('box_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:box_notes,id',
        ];
    }
}
