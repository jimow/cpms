<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCountyRequest;
use App\Http\Requests\StoreCountyRequest;
use App\Http\Requests\UpdateCountyRequest;
use App\Models\County;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountyController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('county_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all();

        return view('frontend.counties.index', compact('counties'));
    }

    public function create()
    {
        abort_if(Gate::denies('county_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.counties.create');
    }

    public function store(StoreCountyRequest $request)
    {
        $county = County::create($request->all());

        return redirect()->route('frontend.counties.index');
    }

    public function edit(County $county)
    {
        abort_if(Gate::denies('county_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.counties.edit', compact('county'));
    }

    public function update(UpdateCountyRequest $request, County $county)
    {
        $county->update($request->all());

        return redirect()->route('frontend.counties.index');
    }

    public function show(County $county)
    {
        abort_if(Gate::denies('county_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.counties.show', compact('county'));
    }

    public function destroy(County $county)
    {
        abort_if(Gate::denies('county_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $county->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountyRequest $request)
    {
        $counties = County::find(request('ids'));

        foreach ($counties as $county) {
            $county->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
