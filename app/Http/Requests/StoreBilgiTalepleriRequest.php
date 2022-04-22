<?php

namespace App\Http\Requests;

use App\Models\BilgiTalepleri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBilgiTalepleriRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bilgi_talepleri_create');
    }

    public function rules()
    {
        return [
            'instagram_kullanici_adi' => [
                'string',
                'nullable',
            ],
            'musteri_adi' => [
                'string',
                'required',
            ],
            'telefon' => [
                'string',
                'required',
            ],
            'mail' => [
                'string',
                'nullable',
            ],
            'zamen.*' => [
                'integer',
            ],
            'zamen' => [
                'array',
            ],
            'giris' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cikis' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'kisi_sayisi' => [
                'string',
                'nullable',
            ],
            'villa_ozelliks.*' => [
                'integer',
            ],
            'villa_ozelliks' => [
                'array',
            ],
            'villa_turu_secs.*' => [
                'integer',
            ],
            'villa_turu_secs' => [
                'array',
            ],
            'bolge_secs.*' => [
                'integer',
            ],
            'bolge_secs' => [
                'array',
            ],
            'min' => [
                'string',
                'nullable',
            ],
            'max' => [
                'string',
                'nullable',
            ],
            'iletisim_zamani' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'talebi_sorumlusu_id' => [
                'required',
                'integer',
            ],
            'talebi_alan_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
