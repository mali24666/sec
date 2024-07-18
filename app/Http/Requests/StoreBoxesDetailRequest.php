<?php

namespace App\Http\Requests;

use App\Models\BoxesDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBoxesDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('boxes_detail_create');
    }

    public function rules()
    {
        return [
            'subscription_number' => [
                'string',
                'required',
                'unique:boxes_details,subscription_number,NULL,id,deleted_at,NULL',
            ],
            'cb' => [
                'string',
                'nullable',
            ],
            'rating' => [
                'string',
                'nullable',
            ],
            'watcher' => [
                'string',
                'nullable',
            ],
            'watch_size' => [
                'string',
                'nullable',
            ],
            'ct_transe' => [
                'string',
                'nullable',
            ],
            'account_number' => [
                'string',
                'nullable',
            ],
            'outside_pic' => [
                'array',
            ],
            'inside_pic' => [
                'array',
            ],
        ];
    }
}