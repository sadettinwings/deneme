<?php

namespace App\Http\Requests;

use App\Models\VillaBolgeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVillaBolgeleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('villa_bolgeleri_create');
    }

    public function rules()
    {
        return [
            'bolgeadi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
