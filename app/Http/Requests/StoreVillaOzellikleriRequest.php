<?php

namespace App\Http\Requests;

use App\Models\VillaOzellikleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVillaOzellikleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('villa_ozellikleri_create');
    }

    public function rules()
    {
        return [
            'ozellikadi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
