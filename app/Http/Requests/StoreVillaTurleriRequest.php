<?php

namespace App\Http\Requests;

use App\Models\VillaTurleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVillaTurleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('villa_turleri_create');
    }

    public function rules()
    {
        return [
            'tur_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
