<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusteriTalepZamaniRequest;
use App\Http\Requests\UpdateMusteriTalepZamaniRequest;
use App\Http\Resources\Admin\MusteriTalepZamaniResource;
use App\Models\MusteriTalepZamani;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriTalepZamaniApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_talep_zamani_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusteriTalepZamaniResource(MusteriTalepZamani::all());
    }

    public function store(StoreMusteriTalepZamaniRequest $request)
    {
        $musteriTalepZamani = MusteriTalepZamani::create($request->all());

        return (new MusteriTalepZamaniResource($musteriTalepZamani))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MusteriTalepZamani $musteriTalepZamani)
    {
        abort_if(Gate::denies('musteri_talep_zamani_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MusteriTalepZamaniResource($musteriTalepZamani);
    }

    public function update(UpdateMusteriTalepZamaniRequest $request, MusteriTalepZamani $musteriTalepZamani)
    {
        $musteriTalepZamani->update($request->all());

        return (new MusteriTalepZamaniResource($musteriTalepZamani))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MusteriTalepZamani $musteriTalepZamani)
    {
        abort_if(Gate::denies('musteri_talep_zamani_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriTalepZamani->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
