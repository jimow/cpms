@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.projects.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.project.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="details">{{ trans('cruds.project.fields.details') }}</label>
                            <input class="form-control" type="text" name="details" id="details" value="{{ old('details', '') }}">
                            @if($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="budget">{{ trans('cruds.project.fields.budget') }}</label>
                            <input class="form-control" type="text" name="budget" id="budget" value="{{ old('budget', '') }}">
                            @if($errors->has('budget'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('budget') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.budget_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.project.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Project::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ward_id">{{ trans('cruds.project.fields.ward') }}</label>
                            <select class="form-control select2" name="ward_id" id="ward_id">
                                @foreach($wards as $id => $entry)
                                    <option value="{{ $id }}" {{ old('ward_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ward'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ward') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.ward_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="department_id">{{ trans('cruds.project.fields.department') }}</label>
                            <select class="form-control select2" name="department_id" id="department_id">
                                @foreach($departments as $id => $entry)
                                    <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('department'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photos">{{ trans('cruds.project.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="financial_year_id">{{ trans('cruds.project.fields.financial_year') }}</label>
                            <select class="form-control select2" name="financial_year_id" id="financial_year_id">
                                @foreach($financial_years as $id => $entry)
                                    <option value="{{ $id }}" {{ old('financial_year_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('financial_year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('financial_year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.financial_year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="feedback">{{ trans('cruds.project.fields.feedback') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="feedback[]" id="feedback" multiple>
                                @foreach($feedback as $id => $feedback)
                                    <option value="{{ $id }}" {{ in_array($id, old('feedback', [])) ? 'selected' : '' }}>{{ $feedback }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('feedback'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('feedback') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.project.fields.feedback_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('frontend.projects.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->photos)
      var files = {!! json_encode($project->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection