<?php

namespace App\Http\Controllers\Frontend;

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

class SubCountyController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_county_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounties = SubCounty::with(['county'])->get();

        $counties = County::get();

        return view('frontend.subCounties.index', compact('counties', 'subCounties'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_county_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.subCounties.create', compact('counties'));
    }

    public function store(StoreSubCountyRequest $request)
    {
        $subCounty = SubCounty::create($request->all());

        return redirect()->route('frontend.sub-counties.index');
    }

    public function edit(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCounty->load('county');

        return view('frontend.subCounties.edit', compact('counties', 'subCounty'));
    }

    public function update(UpdateSubCountyRequest $request, SubCounty $subCounty)
    {
        $subCounty->update($request->all());

        return redirect()->route('frontend.sub-counties.index');
    }

    public function show(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->load('county');

        return view('frontend.subCounties.show', compact('subCounty'));
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
