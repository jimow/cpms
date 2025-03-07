@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.feedback.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedbacks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.id') }}
                        </th>
                        <td>
                            {{ $feedback->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.name') }}
                        </th>
                        <td>
                            {{ $feedback->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.contact') }}
                        </th>
                        <td>
                            {{ $feedback->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.project') }}
                        </th>
                        <td>
                            {{ $feedback->project->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feedback.fields.feedback') }}
                        </th>
                        <td>
                            {!! $feedback->feedback !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.feedbacks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection