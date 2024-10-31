<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Feedback::with(['project'])->select(sprintf('%s.*', (new Feedback)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'feedback_show';
                $editGate      = 'feedback_edit';
                $deleteGate    = 'feedback_delete';
                $crudRoutePart = 'feedbacks';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : '';
            });
            $table->addColumn('project_title', function ($row) {
                return $row->project ? $row->project->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'project']);

            return $table->make(true);
        }

        $projects = Project::get();

        return view('admin.feedbacks.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.feedbacks.create', compact('projects'));
    }

    public function store(StoreFeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $feedback->id]);
        }

        return redirect()->route('admin.feedbacks.index');
    }

    public function edit(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback->load('project');

        return view('admin.feedbacks.edit', compact('feedback', 'projects'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->all());

        return redirect()->route('admin.feedbacks.index');
    }

    public function show(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedback->load('project');

        return view('admin.feedbacks.show', compact('feedback'));
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
