<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSssRequest;
use App\Http\Requests\UpdateSssRequest;
use App\Http\Resources\Admin\SssResource;
use App\Models\Sss;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SssApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sss_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SssResource(Sss::with(['kategori_sec'])->get());
    }

    public function store(StoreSssRequest $request)
    {
        $sss = Sss::create($request->all());

        return (new SssResource($sss))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sss $sss)
    {
        abort_if(Gate::denies('sss_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SssResource($sss->load(['kategori_sec']));
    }

    public function update(UpdateSssRequest $request, Sss $sss)
    {
        $sss->update($request->all());

        return (new SssResource($sss))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sss $sss)
    {
        abort_if(Gate::denies('sss_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sss->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
