<?php

namespace App\Http\Requests;

use App\Models\BilgiTalepleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBilgiTalepleriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bilgi_talepleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bilgi_talepleris,id',
        ];
    }
}
