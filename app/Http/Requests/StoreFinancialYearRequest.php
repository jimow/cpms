<?php

namespace App\Http\Requests;

use App\Models\FinancialYear;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFinancialYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('financial_year_create');
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
