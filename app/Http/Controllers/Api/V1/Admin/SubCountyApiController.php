<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCountyRequest;
use App\Http\Requests\UpdateSubCountyRequest;
use App\Http\Resources\Admin\SubCountyResource;
use App\Models\SubCounty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCountyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_county_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCountyResource(SubCounty::with(['county'])->get());
    }

    public function store(StoreSubCountyRequest $request)
    {
        $subCounty = SubCounty::create($request->all());

        return (new SubCountyResource($subCounty))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCountyResource($subCounty->load(['county']));
    }

    public function update(UpdateSubCountyRequest $request, SubCounty $subCounty)
    {
        $subCounty->update($request->all());

        return (new SubCountyResource($subCounty))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
