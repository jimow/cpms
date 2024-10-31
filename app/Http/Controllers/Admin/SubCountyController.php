<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySubCountyRequest;
use App\Http\Requests\StoreSubCountyRequest;
use App\Http\Requests\UpdateSubCountyRequest;
use App\Models\County;
use App\Models\SubCounty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubCountyController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sub_county_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SubCounty::with(['county'])->select(sprintf('%s.*', (new SubCounty)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sub_county_show';
                $editGate      = 'sub_county_edit';
                $deleteGate    = 'sub_county_delete';
                $crudRoutePart = 'sub-counties';

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
            $table->addColumn('county_name', function ($row) {
                return $row->county ? $row->county->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'county']);

            return $table->make(true);
        }

        $counties = County::get();

        return view('admin.subCounties.index', compact('counties'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_county_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subCounties.create', compact('counties'));
    }

    public function store(StoreSubCountyRequest $request)
    {
        $subCounty = SubCounty::create($request->all());

        return redirect()->route('admin.sub-counties.index');
    }

    public function edit(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCounty->load('county');

        return view('admin.subCounties.edit', compact('counties', 'subCounty'));
    }

    public function update(UpdateSubCountyRequest $request, SubCounty $subCounty)
    {
        $subCounty->update($request->all());

        return redirect()->route('admin.sub-counties.index');
    }

    public function show(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->load('county');

        return view('admin.subCounties.show', compact('subCounty'));
    }

    public function destroy(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCountyRequest $request)
    {
        $subCounties = SubCounty::find(request('ids'));

        foreach ($subCounties as $subCounty) {
            $subCounty->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
