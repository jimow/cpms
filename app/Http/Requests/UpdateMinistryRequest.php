<?php

namespace App\Http\Requests;

use App\Models\Ministry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMinistryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ministry_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
