<?php

namespace App\Http\Requests;

use App\Models\Sss;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSssRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sss_create');
    }

    public function rules()
    {
        return [
            'soru' => [
                'string',
                'nullable',
            ],
        ];
    }
}
