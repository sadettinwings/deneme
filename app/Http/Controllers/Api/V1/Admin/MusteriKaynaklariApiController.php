<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusteriKaynaklariRequest;
use App\Http\Requests\UpdateMusteriKaynaklariRequest;
use App\Http\Resources\Admin\MusteriKaynaklariResource;
use App\Models\MusteriKaynaklari;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriKaynaklariApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_kaynaklari_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusteriKaynaklariResource(MusteriKaynaklari::all());
    }

    public function store(StoreMusteriKaynaklariRequest $request)
    {
        $musteriKaynaklari = MusteriKaynaklari::create($request->all());

        return (new MusteriKaynaklariResource($musteriKaynaklari))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MusteriKaynaklari $musteriKaynaklari)
    {
        abort_if(Gate::denies('musteri_kaynaklari_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusteriKaynaklariResource($musteriKaynaklari);
    }

    public function update(UpdateMusteriKaynaklariRequest $request, MusteriKaynaklari $musteriKaynaklari)
    {
        $musteriKaynaklari->update($request->all());

        return (new MusteriKaynaklariResource($musteriKaynaklari))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MusteriKaynaklari $musteriKaynaklari)
    {
        abort_if(Gate::denies('musteri_kaynaklari_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriKaynaklari->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
