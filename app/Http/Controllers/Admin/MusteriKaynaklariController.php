<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMusteriKaynaklariRequest;
use App\Http\Requests\StoreMusteriKaynaklariRequest;
use App\Http\Requests\UpdateMusteriKaynaklariRequest;
use App\Models\MusteriKaynaklari;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriKaynaklariController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_kaynaklari_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriKaynaklaris = MusteriKaynaklari::all();

        return view('admin.musteriKaynaklaris.index', compact('musteriKaynaklaris'));
    }

    public function create()
    {
        abort_if(Gate::denies('musteri_kaynaklari_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriKaynaklaris.create');
    }

    public function store(StoreMusteriKaynaklariRequest $request)
    {
        $musteriKaynaklari = MusteriKaynaklari::create($request->all());

        return redirect()->route('admin.musteri-kaynaklaris.index');
    }

    public function edit(MusteriKaynaklari $musteriKaynaklari)
    {
        abort_if(Gate::denies('musteri_kaynaklari_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriKaynaklaris.edit', compact('musteriKaynaklari'));
    }

    public function update(UpdateMusteriKaynaklariRequest $request, MusteriKaynaklari $musteriKaynaklari)
    {
        $musteriKaynaklari->update($request->all());

        return redirect()->route('admin.musteri-kaynaklaris.index');
    }

    public function show(MusteriKaynaklari $musteriKaynaklari)
    {
        abort_if(Gate::denies('musteri_kaynaklari_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriKaynaklari->load('musteriKaynagiBilgiTalepleris');

        return view('admin.musteriKaynaklaris.show', compact('musteriKaynaklari'));
    }

    public function destroy(MusteriKaynaklari $musteriKaynaklari)
    {
        abort_if(Gate::denies('musteri_kaynaklari_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriKaynaklari->delete();

        return back();
    }

    public function massDestroy(MassDestroyMusteriKaynaklariRequest $request)
    {
        MusteriKaynaklari::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
