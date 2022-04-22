<?php

namespace App\Http\Requests;

use App\Models\MusteriStatuleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMusteriStatuleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('musteri_statuleri_create');
    }

    public function rules()
    {
        return [
            'statu_adi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
