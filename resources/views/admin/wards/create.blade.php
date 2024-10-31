@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ward.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.wards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.ward.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ward.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_county_id">{{ trans('cruds.ward.fields.sub_county') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_county') ? 'is-invalid' : '' }}" name="sub_county_id" id="sub_county_id">
                    @foreach($sub_counties as $id => $entry)
                        <option value="{{ $id }}" {{ old('sub_county_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ward.fields.sub_county_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection