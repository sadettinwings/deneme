<?php

namespace App\Http\Requests;

use App\Models\Gorusmeler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGorusmelerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gorusmeler_create');
    }

    public function rules()
    {
        return [];
    }
}
