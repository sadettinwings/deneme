<?php

namespace App\Http\Requests;

use App\Models\GorusmeKategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGorusmeKategoriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gorusme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gorusme_kategoris,id',
        ];
    }
}
