<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVillaBolgeleriRequest;
use App\Http\Requests\StoreVillaBolgeleriRequest;
use App\Http\Requests\UpdateVillaBolgeleriRequest;
use App\Models\VillaBolgeleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillaBolgeleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('villa_bolgeleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaBolgeleris = VillaBolgeleri::all();

        return view('admin.villaBolgeleris.index', compact('villaBolgeleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('villa_bolgeleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaBolgeleris.create');
    }

    public function store(StoreVillaBolgeleriRequest $request)
    {
        $villaBolgeleri = VillaBolgeleri::create($request->all());

        return redirect()->route('admin.villa-bolgeleris.index');
    }

    public function edit(VillaBolgeleri $villaBolgeleri)
    {
        abort_if(Gate::denies('villa_bolgeleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaBolgeleris.edit', compact('villaBolgeleri'));
    }

    public function update(UpdateVillaBolgeleriRequest $request, VillaBolgeleri $villaBolgeleri)
    {
        $villaBolgeleri->update($request->all());

        return redirect()->route('admin.villa-bolgeleris.index');
    }

    public function show(VillaBolgeleri $villaBolgeleri)
    {
        abort_if(Gate::denies('villa_bolgeleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaBolgeleri->load('bolgeSecBilgiTalepleris');

        return view('admin.villaBolgeleris.show', compact('villaBolgeleri'));
    }

    public function destroy(VillaBolgeleri $villaBolgeleri)
    {
        abort_if(Gate::denies('villa_bolgeleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaBolgeleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyVillaBolgeleriRequest $request)
    {
        VillaBolgeleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
