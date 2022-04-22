<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGorusmelerRequest;
use App\Http\Requests\UpdateGorusmelerRequest;
use App\Http\Resources\Admin\GorusmelerResource;
use App\Models\Gorusmeler;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GorusmelerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gorusmeler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GorusmelerResource(Gorusmeler::with(['musteri_sec_2', 'gorusen_kisi', 'kategori'])->get());
    }

    public function store(StoreGorusmelerRequest $request)
    {
        $gorusmeler = Gorusmeler::create($request->all());

        return (new GorusmelerResource($gorusmeler))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gorusmeler $gorusmeler)
    {
        abort_if(Gate::denies('gorusmeler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GorusmelerResource($gorusmeler->load(['musteri_sec_2', 'gorusen_kisi', 'kategori']));
    }

    public function update(UpdateGorusmelerRequest $request, Gorusmeler $gorusmeler)
    {
        $gorusmeler->update($request->all());

        return (new GorusmelerResource($gorusmeler))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gorusmeler $gorusmeler)
    {
        abort_if(Gate::denies('gorusmeler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeler->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
