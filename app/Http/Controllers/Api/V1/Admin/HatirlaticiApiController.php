<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHatirlaticiRequest;
use App\Http\Requests\UpdateHatirlaticiRequest;
use App\Http\Resources\Admin\HatirlaticiResource;
use App\Models\Hatirlatici;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HatirlaticiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hatirlatici_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HatirlaticiResource(Hatirlatici::with(['talep_sec', 'ilgili_kullanici'])->get());
    }

    public function store(StoreHatirlaticiRequest $request)
    {
        $hatirlatici = Hatirlatici::create($request->all());

        return (new HatirlaticiResource($hatirlatici))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hatirlatici $hatirlatici)
    {
        abort_if(Gate::denies('hatirlatici_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HatirlaticiResource($hatirlatici->load(['talep_sec', 'ilgili_kullanici']));
    }

    public function update(UpdateHatirlaticiRequest $request, Hatirlatici $hatirlatici)
    {
        $hatirlatici->update($request->all());

        return (new HatirlaticiResource($hatirlatici))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hatirlatici $hatirlatici)
    {
        abort_if(Gate::denies('hatirlatici_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hatirlatici->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
