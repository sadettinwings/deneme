<?php

namespace App\Http\Requests;

use App\Models\Gorusmeler;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGorusmelerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gorusmeler_edit');
    }

    public function rules()
    {
        return [];
    }
}
