<?php

namespace App\Http\Requests;

use App\Models\MusteriAsamalari;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMusteriAsamalariRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('musteri_asamalari_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:musteri_asamalaris,id',
        ];
    }
}
