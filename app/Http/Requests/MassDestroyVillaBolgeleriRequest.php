<?php

namespace App\Http\Requests;

use App\Models\VillaBolgeleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVillaBolgeleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('villa_bolgeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:villa_bolgeleris,id',
        ];
    }
}
