<?php

namespace App\Http\Requests;

use App\Models\VillaOzellikleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVillaOzellikleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('villa_ozellikleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:villa_ozellikleris,id',
        ];
    }
}
