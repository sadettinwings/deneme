<?php

namespace App\Http\Requests;

use App\Models\MusteriKaynaklari;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMusteriKaynaklariRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('musteri_kaynaklari_create');
    }

    public function rules()
    {
        return [
            'kaynakadi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
