<?php

namespace App\Http\Requests;

use App\Models\Ssskategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSsskategoriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ssskategori_edit');
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
