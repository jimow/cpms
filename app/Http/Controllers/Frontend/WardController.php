<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyWardRequest;
use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use App\Models\SubCounty;
use App\Models\Ward;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WardController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('ward_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::with(['sub_county'])->get();

        $sub_counties = SubCounty::get();

        return view('frontend.wards.index', compact('sub_counties', 'wards'));
    }

    public function create()
    {
        abort_if(Gate::denies('ward_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_counties = SubCounty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.wards.create', compact('sub_counties'));
    }

    public function store(StoreWardRequest $request)
    {
        $ward = Ward::create($request->all());

        return redirect()->route('frontend.wards.index');
    }

    public function edit(Ward $ward)
    {
        abort_if(Gate::denies('ward_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_counties = SubCounty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ward->load('sub_county');

        return view('frontend.wards.edit', compact('sub_counties', 'ward'));
    }

    public function update(UpdateWardRequest $request, Ward $ward)
    {
        $ward->update($request->all());

        return redirect()->route('frontend.wards.index');
    }

    public function show(Ward $ward)
    {
        abort_if(Gate::denies('ward_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ward->load('sub_county');

        return view('frontend.wards.show', compact('ward'));
    }

    public function destroy(Ward $ward)
    {
        abort_if(Gate::denies('ward_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ward->delete();

        return back();
    }

    public function massDestroy(MassDestroyWardRequest $request)
    {
        $wards = Ward::find(request('ids'));

        foreach ($wards as $ward) {
            $ward->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
