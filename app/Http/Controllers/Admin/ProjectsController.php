<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Department;
use App\Models\Feedback;
use App\Models\FinancialYear;
use App\Models\Project;
use App\Models\Ward;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Project::with(['ward', 'department', 'financial_year', 'feedback'])->select(sprintf('%s.*', (new Project)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_show';
                $editGate      = 'project_edit';
                $deleteGate    = 'project_delete';
                $crudRoutePart = 'projects';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });
            $table->editColumn('budget', function ($row) {
                return $row->budget ? $row->budget : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Project::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('ward_name', function ($row) {
                return $row->ward ? $row->ward->name : '';
            });

            $table->addColumn('department_name', function ($row) {
                return $row->department ? $row->department->name : '';
            });

            $table->editColumn('photos', function ($row) {
                if (! $row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->addColumn('financial_year_name', function ($row) {
                return $row->financial_year ? $row->financial_year->name : '';
            });

            $table->editColumn('feedback', function ($row) {
                $labels = [];
                foreach ($row->feedback as $feedback) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $feedback->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'ward', 'department', 'photos', 'financial_year', 'feedback']);

            return $table->make(true);
        }

        $wards           = Ward::get();
        $departments     = Department::get();
        $financial_years = FinancialYear::get();
        $feedbacks       = Feedback::get();

        return view('admin.projects.index', compact('wards', 'departments', 'financial_years', 'feedbacks'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback = Feedback::pluck('name', 'id');

        return view('admin.projects.create', compact('departments', 'feedback', 'financial_years', 'wards'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->feedback()->sync($request->input('feedback', []));
        foreach ($request->input('photos', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback = Feedback::pluck('name', 'id');

        $project->load('ward', 'department', 'financial_year', 'feedback');

        return view('admin.projects.edit', compact('departments', 'feedback', 'financial_years', 'project', 'wards'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->feedback()->sync($request->input('feedback', []));
        if (count($project->photos) > 0) {
            foreach ($project->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('ward', 'department', 'financial_year', 'feedback');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $projects = Project::find(request('ids'));

        foreach ($projects as $project) {
            $project->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
