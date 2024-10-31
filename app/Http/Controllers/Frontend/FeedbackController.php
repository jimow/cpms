<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFeedbackRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FeedbackController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbacks = Feedback::with(['project'])->get();

        $projects = Project::get();

        return view('frontend.feedbacks.index', compact('feedbacks', 'projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.feedbacks.create', compact('projects'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $feedback->id]);
        }

        return redirect()->route('frontend.feedbacks.index');
    }

    public function edit(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback->load('project');

        return view('frontend.feedbacks.edit', compact('feedback', 'projects'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->all());

        return redirect()->route('frontend.feedbacks.index');
    }

    public function show(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback->load('project');

        return view('frontend.feedbacks.show', compact('feedback'));
    }

    public function destroy(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeedbackRequest $request)
    {
        $feedbacks = Feedback::find(request('ids'));

        foreach ($feedbacks as $feedback) {
            $feedback->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('feedback_create') && Gate::denies('feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Feedback();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
