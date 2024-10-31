<?php

namespace App\Http\Controllers\Frontend;

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
use ConsoleTVs\Charts\Facades\Charts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
       // abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       

       $projectsCount = [
        'Stalled' => Project::where('status', 'Stalled')->count(),
        'Ongoing' => Project::where('status', 'Ongoing')->count(),
        'In Procurement' => Project::where('status', 'In Procurement')->count(),
        'Completed' => Project::where('status', 'Completed')->count(),
    ];

    // Create a chart
    $chart = Charts::create('pie', 'highcharts') // You can change 'pie' to other types like 'bar', 'line', etc.
        ->title('Project Status Distribution')
        ->labels(array_keys($projectsCount))
        ->values(array_values($projectsCount))
        ->dimensions(1000, 500)
        ->responsive(true);


       $departments = Department::withCount(['projects as project_count' => function($query) {
        $query->select(\DB::raw("COUNT(*)"));
    }])
    ->withSum('projects as total_cost', 'budget')
    ->get();

       $currentDate = Carbon::now();
$currentYear = $currentDate->year;
$currentMonth = $currentDate->month;

// Determine financial year string based on date
if ($currentMonth >= 7) {
    // If it's July or later, we're in the current year - next year financial year
    $financialYearName = "{$currentYear}-" . ($currentYear + 1);
} else {
    // If it's before July, we're in the previous year - current year financial year
    $financialYearName = ($currentYear - 1) . "-{$currentYear}";
}

// Step 2: Retrieve the financial year ID based on the name
$financialYear = FinancialYear::where('name', $financialYearName)->first();
if (!$financialYear) {
    abort(404, "Financial year not found.");
}

// Step 3: Use the financial year ID to fetch project totals and costs
$financialYearId = $financialYear->id;
$totalProjectYear  = Project::where('financial_year_id', $financialYearId)->count();
$totalCostYear = Project::where('financial_year_id', $financialYearId)->sum('budget');

       $totalProjects = Project::count();
       $totalCost = Project::sum('budget');

       $ongoingProjects = Project::where('status', 'Ongoing');
       $totalOngoingProjects = $ongoingProjects->count();
       $totalOngoingCost = $ongoingProjects->sum('budget');

       $completedProjects = Project::where('status', 'Completed');
       $totalCompletedProjects = $completedProjects->count();
       $totalCompletedCost = $completedProjects->sum('budget');


       $stalledProjects = Project::where('status', 'Stalled');
       $totalStalledProjects = $stalledProjects->count();
       $totalStalledCost = $stalledProjects->sum('budget');
   
       return view('frontend.projects.index', compact('chart','departments','totalProjectYear','totalCostYear','totalStalledProjects','totalStalledCost','totalProjects', 'totalCost','totalOngoingProjects','totalOngoingCost','totalCompletedProjects','totalCompletedCost'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback = Feedback::pluck('name', 'id');

        return view('frontend.projects.create', compact('departments', 'feedback', 'financial_years', 'wards'));
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

        return redirect()->route('frontend.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedback = Feedback::pluck('name', 'id');

        $project->load('ward', 'department', 'financial_year', 'feedback');

        return view('frontend.projects.edit', compact('departments', 'feedback', 'financial_years', 'project', 'wards'));
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

        return redirect()->route('frontend.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('ward', 'department', 'financial_year', 'feedback');

        return view('frontend.projects.show', compact('project'));
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
