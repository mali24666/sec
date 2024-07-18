<?php

namespace App\Http\Requests;

use App\Models\Tool;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreToolRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tool_create');
    }

    public function rules()
    {
        return [
            'tool_name' => [
                'string',
                'required',
            ],
        ];
    }
}
