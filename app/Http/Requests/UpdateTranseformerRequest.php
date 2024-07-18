<?php

namespace App\Http\Requests;

use App\Models\Transeformer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTranseformerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transeformer_edit');
    }

    public function rules()
    {
        return [
            't_no' => [
                'string',
                'required',
                'unique:transeformers,t_no,' . request()->route('transeformer')->id.',id,deleted_at,NULL',
            ],
           'cbs.*' => [
                'integer',
            ],
            'cbs' => [
                'array',
            ],
            'x_minb' => [
                'string',
                'nullable',
            ],
            'primary_voltage' => [
                'string',
                'nullable',
            ],
            'sec_voltage' => [
                'string',
                'nullable',
            ],
            'manuf_sno' => [
                'string',
                'nullable',
            ],
            'manufacturer' => [
                'string',
                'nullable',
            ],
            'manafac_year' => [
                'string',
                'nullable',
            ],
            'over_load' => [
                'string',
                'nullable',
            ],
            'load_y' => [
                'numeric',
            ],
            'load_b' => [
                'string',
                'nullable',
            ],
            'load_r' => [
                'string',
                'nullable',
            ],
            'no_of_cb' => [
                'string',
                'nullable',
            ],
            'no_of_minbilar' => [
                'string',
                'nullable',
            ],
            'no_of_boxes' => [
                'string',
                'nullable',
            ],
            'transformer_temperature' => [
                'string',
                'nullable',
            ],
            'reference_temperature' => [
                'string',
                'nullable',
            ],
            'transformer_temperature_picture' => [
                'array',
            ],
            'transe_notes.*' => [
                'integer',
            ],
            'transe_notes' => [
                'array',
            ],
            'picture_befor' => [
                'array',
            ],
            'y_minb' => [
                'string',
                'nullable',
            ],
            'manuf' => [
                'string',
                'nullable',
            ],
            'left_ss' => [
                'string',
                'nullable',
            ],
            'right_ss' => [
                'string',
                'nullable',
            ],
            'serial_no' => [
                'string',
                'nullable',
            ],
            'photo_after' => [
                'array',
            ],
            'noise_r' => [
                'string',
                'nullable',
            ],
            'noise_l' => [
                'string',
                'nullable',
            ],
            'noise_o' => [
                'string',
                'nullable',
            ],
            'noise_t' => [
                'string',
                'nullable',
            ],
            'noise_refreence' => [
                'string',
                'nullable',
            ],
            'noise_r_picture' => [
                'array',
            ],
            'noise_l_picture' => [
                'array',
            ],
            'noise_o_picture' => [
                'array',
            ],
            'noise_t_picture' => [
                'array',
            ],
            'panal_capasity' => [
                'string',
                'nullable',
            ],
            'ct' => [
                'string',
                'nullable',
            ],
            'panal_year' => [
                'string',
                'nullable',
            ],
            'panel_serial_no' => [
                'string',
                'nullable',
            ],
            'panel_manufacture' => [
                'string',
                'nullable',
            ],
        ];
    }
}