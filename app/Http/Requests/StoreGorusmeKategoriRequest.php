<?php

namespace App\Http\Requests;

use App\Models\GorusmeKategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGorusmeKategoriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gorusme_kategori_create');
    }

    public function rules()
    {
        return [
            'kategori' => [
                'string',
                'nullable',
            ],
        ];
    }
}
