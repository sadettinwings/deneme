<?php

namespace App\Http\Requests;

use App\Models\MusteriTalepZamani;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMusteriTalepZamaniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('musteri_talep_zamani_create');
    }

    public function rules()
    {
        return [
            'talep_ettigi_zaman' => [
                'string',
                'nullable',
            ],
        ];
    }
}
