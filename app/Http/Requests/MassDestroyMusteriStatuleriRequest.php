<?php

namespace App\Http\Requests;

use App\Models\MusteriStatuleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMusteriStatuleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('musteri_statuleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:musteri_statuleris,id',
        ];
    }
}
