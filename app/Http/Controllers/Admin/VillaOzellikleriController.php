<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVillaOzellikleriRequest;
use App\Http\Requests\StoreVillaOzellikleriRequest;
use App\Http\Requests\UpdateVillaOzellikleriRequest;
use App\Models\VillaOzellikleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillaOzellikleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('villa_ozellikleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaOzellikleris = VillaOzellikleri::all();

        return view('admin.villaOzellikleris.index', compact('villaOzellikleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('villa_ozellikleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaOzellikleris.create');
    }

    public function store(StoreVillaOzellikleriRequest $request)
    {
        $villaOzellikleri = VillaOzellikleri::create($request->all());

        return redirect()->route('admin.villa-ozellikleris.index');
    }

    public function edit(VillaOzellikleri $villaOzellikleri)
    {
        abort_if(Gate::denies('villa_ozellikleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaOzellikleris.edit', compact('villaOzellikleri'));
    }

    public function update(UpdateVillaOzellikleriRequest $request, VillaOzellikleri $villaOzellikleri)
    {
        $villaOzellikleri->update($request->all());

        return redirect()->route('admin.villa-ozellikleris.index');
    }

    public function show(VillaOzellikleri $villaOzellikleri)
    {
        abort_if(Gate::denies('villa_ozellikleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaOzellikleri->load('villaOzellikBilgiTalepleris');

        return view('admin.villaOzellikleris.show', compact('villaOzellikleri'));
    }

    public function destroy(VillaOzellikleri $villaOzellikleri)
    {
        abort_if(Gate::denies('villa_ozellikleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaOzellikleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyVillaOzellikleriRequest $request)
    {
        VillaOzellikleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
