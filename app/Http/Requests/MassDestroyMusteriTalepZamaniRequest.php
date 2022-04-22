<?php

namespace App\Http\Requests;

use App\Models\MusteriTalepZamani;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMusteriTalepZamaniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('musteri_talep_zamani_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:musteri_talep_zamanis,id',
        ];
    }
}
