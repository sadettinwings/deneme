<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBilgiTalepleriRequest;
use App\Http\Requests\UpdateBilgiTalepleriRequest;
use App\Http\Resources\Admin\BilgiTalepleriResource;
use App\Models\BilgiTalepleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BilgiTalepleriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bilgi_talepleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BilgiTalepleriResource(BilgiTalepleri::with(['musteri_kaynagi', 'zamen', 'villa_ozelliks', 'villa_turu_secs', 'bolge_secs', 'talep_asama', 'talebi_sorumlusu', 'talebi_alan', 'talep_statu'])->get());
    }

    public function store(StoreBilgiTalepleriRequest $request)
    {
        $bilgiTalepleri = BilgiTalepleri::create($request->all());
        $bilgiTalepleri->zamen()->sync($request->input('zamen', []));
        $bilgiTalepleri->villa_ozelliks()->sync($request->input('villa_ozelliks', []));
        $bilgiTalepleri->villa_turu_secs()->sync($request->input('villa_turu_secs', []));
        $bilgiTalepleri->bolge_secs()->sync($request->input('bolge_secs', []));

        return (new BilgiTalepleriResource($bilgiTalepleri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BilgiTalepleri $bilgiTalepleri)
    {
        abort_if(Gate::denies('bilgi_talepleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BilgiTalepleriResource($bilgiTalepleri->load(['musteri_kaynagi', 'zamen', 'villa_ozelliks', 'villa_turu_secs', 'bolge_secs', 'talep_asama', 'talebi_sorumlusu', 'talebi_alan', 'talep_statu']));
    }

    public function update(UpdateBilgiTalepleriRequest $request, BilgiTalepleri $bilgiTalepleri)
    {
        $bilgiTalepleri->update($request->all());
        $bilgiTalepleri->zamen()->sync($request->input('zamen', []));
        $bilgiTalepleri->villa_ozelliks()->sync($request->input('villa_ozelliks', []));
        $bilgiTalepleri->villa_turu_secs()->sync($request->input('villa_turu_secs', []));
        $bilgiTalepleri->bolge_secs()->sync($request->input('bolge_secs', []));

        return (new BilgiTalepleriResource($bilgiTalepleri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BilgiTalepleri $bilgiTalepleri)
    {
        abort_if(Gate::denies('bilgi_talepleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bilgiTalepleri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
