@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.departments.update", [$department->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.department.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $department->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.department.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ministry_id">{{ trans('cruds.department.fields.ministry') }}</label>
                            <select class="form-control select2" name="ministry_id" id="ministry_id">
                                @foreach($ministries as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ministry_id') ? old('ministry_id') : $department->ministry->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ministry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ministry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.department.fields.ministry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection