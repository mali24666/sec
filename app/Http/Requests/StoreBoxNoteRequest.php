<?php

namespace App\Http\Requests;

use App\Models\BoxNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBoxNoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('box_note_create');
    }

    public function rules()
    {
        return [
            'box_note' => [
                'string',
                'required',
            ],
        ];
    }
}
