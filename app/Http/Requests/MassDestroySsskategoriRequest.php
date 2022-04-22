<?php

namespace App\Http\Requests;

use App\Models\Ssskategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySsskategoriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ssskategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ssskategoris,id',
        ];
    }
}
