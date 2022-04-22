<?php

namespace App\Http\Requests;

use App\Models\Ssskategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSsskategoriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ssskategori_create');
    }

    public function rules()
    {
        return [
            's_kategori_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
