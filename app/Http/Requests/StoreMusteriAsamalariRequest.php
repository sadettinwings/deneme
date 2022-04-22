<?php

namespace App\Http\Requests;

use App\Models\MusteriAsamalari;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMusteriAsamalariRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('musteri_asamalari_create');
    }

    public function rules()
    {
        return [
            'asamaadi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
