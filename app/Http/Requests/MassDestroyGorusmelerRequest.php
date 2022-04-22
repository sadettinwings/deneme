<?php

namespace App\Http\Requests;

use App\Models\Gorusmeler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGorusmelerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gorusmeler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gorusmelers,id',
        ];
    }
}
