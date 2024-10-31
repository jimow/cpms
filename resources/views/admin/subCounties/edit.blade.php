@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subCounty.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub-counties.update", [$subCounty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.subCounty.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $subCounty->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCounty.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="county_id">{{ trans('cruds.subCounty.fields.county') }}</label>
                <select class="form-control select2 {{ $errors->has('county') ? 'is-invalid' : '' }}" name="county_id" id="county_id">
                    @foreach($counties as $id => $entry)
                        <option value="{{ $id }}" {{ (old('county_id') ? old('county_id') : $subCounty->county->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCounty.fields.county_helper') }}</span>
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