<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'details' => [
                'string',
                'nullable',
            ],
            'budget' => [
                'string',
                'nullable',
            ],
            'photos' => [
                'array',
            ],
            'feedback.*' => [
                'integer',
            ],
            'feedback' => [
                'array',
            ],
        ];
    }
}
