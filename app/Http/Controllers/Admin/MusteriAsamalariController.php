<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMusteriAsamalariRequest;
use App\Http\Requests\StoreMusteriAsamalariRequest;
use App\Http\Requests\UpdateMusteriAsamalariRequest;
use App\Models\MusteriAsamalari;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriAsamalariController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_asamalari_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriAsamalaris = MusteriAsamalari::all();

        return view('admin.musteriAsamalaris.index', compact('musteriAsamalaris'));
    }

    public function create()
    {
        abort_if(Gate::denies('musteri_asamalari_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriAsamalaris.create');
    }

    public function store(StoreMusteriAsamalariRequest $request)
    {
        $musteriAsamalari = MusteriAsamalari::create($request->all());

        return redirect()->route('admin.musteri-asamalaris.index');
    }

    public function edit(MusteriAsamalari $musteriAsamalari)
    {
        abort_if(Gate::denies('musteri_asamalari_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriAsamalaris.edit', compact('musteriAsamalari'));
    }

    public function update(UpdateMusteriAsamalariRequest $request, MusteriAsamalari $musteriAsamalari)
    {
        $musteriAsamalari->update($request->all());

        return redirect()->route('admin.musteri-asamalaris.index');
    }

    public function show(MusteriAsamalari $musteriAsamalari)
    {
        abort_if(Gate::denies('musteri_asamalari_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriAsamalari->load('talepAsamaBilgiTalepleris');

        return view('admin.musteriAsamalaris.show', compact('musteriAsamalari'));
    }

    public function destroy(MusteriAsamalari $musteriAsamalari)
    {
        abort_if(Gate::denies('musteri_asamalari_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriAsamalari->delete();

        return back();
    }

    public function massDestroy(MassDestroyMusteriAsamalariRequest $request)
    {
        MusteriAsamalari::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
