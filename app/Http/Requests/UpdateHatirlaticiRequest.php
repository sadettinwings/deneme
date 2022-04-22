<?php

namespace App\Http\Requests;

use App\Models\Hatirlatici;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHatirlaticiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hatirlatici_edit');
    }

    public function rules()
    {
        return [
            'hatirlatma_zamani' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'baslik' => [
                'string',
                'nullable',
            ],
        ];
    }
}
