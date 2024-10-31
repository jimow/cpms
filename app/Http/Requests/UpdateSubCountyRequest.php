<?php

namespace App\Http\Requests;

use App\Models\SubCounty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubCountyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_county_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
