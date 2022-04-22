<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMusteriStatuleriRequest;
use App\Http\Requests\StoreMusteriStatuleriRequest;
use App\Http\Requests\UpdateMusteriStatuleriRequest;
use App\Models\MusteriStatuleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriStatuleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_statuleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriStatuleris = MusteriStatuleri::all();

        return view('admin.musteriStatuleris.index', compact('musteriStatuleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('musteri_statuleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriStatuleris.create');
    }

    public function store(StoreMusteriStatuleriRequest $request)
    {
        $musteriStatuleri = MusteriStatuleri::create($request->all());

        return redirect()->route('admin.musteri-statuleris.index');
    }

    public function edit(MusteriStatuleri $musteriStatuleri)
    {
        abort_if(Gate::denies('musteri_statuleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriStatuleris.edit', compact('musteriStatuleri'));
    }

    public function update(UpdateMusteriStatuleriRequest $request, MusteriStatuleri $musteriStatuleri)
    {
        $musteriStatuleri->update($request->all());

        return redirect()->route('admin.musteri-statuleris.index');
    }

    public function show(MusteriStatuleri $musteriStatuleri)
    {
        abort_if(Gate::denies('musteri_statuleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriStatuleri->load('talepStatuBilgiTalepleris');

        return view('admin.musteriStatuleris.show', compact('musteriStatuleri'));
    }

    public function destroy(MusteriStatuleri $musteriStatuleri)
    {
        abort_if(Gate::denies('musteri_statuleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriStatuleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyMusteriStatuleriRequest $request)
    {
        MusteriStatuleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
