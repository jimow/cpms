<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMinistryRequest;
use App\Http\Requests\StoreMinistryRequest;
use App\Http\Requests\UpdateMinistryRequest;
use App\Models\Ministry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinistryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('ministry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministries = Ministry::all();

        return view('frontend.ministries.index', compact('ministries'));
    }

    public function create()
    {
        abort_if(Gate::denies('ministry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.ministries.create');
    }

    public function store(StoreMinistryRequest $request)
    {
        $ministry = Ministry::create($request->all());

        return redirect()->route('frontend.ministries.index');
    }

    public function edit(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.ministries.edit', compact('ministry'));
    }

    public function update(UpdateMinistryRequest $request, Ministry $ministry)
    {
        $ministry->update($request->all());

        return redirect()->route('frontend.ministries.index');
    }

    public function show(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.ministries.show', compact('ministry'));
    }

    public function destroy(Ministry $ministry)
    {
        abort_if(Gate::denies('ministry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ministry->delete();

        return back();
    }

    public function massDestroy(MassDestroyMinistryRequest $request)
    {
        $ministries = Ministry::find(request('ids'));

        foreach ($ministries as $ministry) {
            $ministry->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
