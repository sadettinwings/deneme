<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMusteriTalepZamaniRequest;
use App\Http\Requests\StoreMusteriTalepZamaniRequest;
use App\Http\Requests\UpdateMusteriTalepZamaniRequest;
use App\Models\MusteriTalepZamani;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MusteriTalepZamaniController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('musteri_talep_zamani_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriTalepZamanis = MusteriTalepZamani::all();

        return view('admin.musteriTalepZamanis.index', compact('musteriTalepZamanis'));
    }

    public function create()
    {
        abort_if(Gate::denies('musteri_talep_zamani_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriTalepZamanis.create');
    }

    public function store(StoreMusteriTalepZamaniRequest $request)
    {
        $musteriTalepZamani = MusteriTalepZamani::create($request->all());

        return redirect()->route('admin.musteri-talep-zamanis.index');
    }

    public function edit(MusteriTalepZamani $musteriTalepZamani)
    {
        abort_if(Gate::denies('musteri_talep_zamani_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.musteriTalepZamanis.edit', compact('musteriTalepZamani'));
    }

    public function update(UpdateMusteriTalepZamaniRequest $request, MusteriTalepZamani $musteriTalepZamani)
    {
        $musteriTalepZamani->update($request->all());

        return redirect()->route('admin.musteri-talep-zamanis.index');
    }

    public function show(MusteriTalepZamani $musteriTalepZamani)
    {
        abort_if(Gate::denies('musteri_talep_zamani_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriTalepZamani->load('zamanBilgiTalepleris');

        return view('admin.musteriTalepZamanis.show', compact('musteriTalepZamani'));
    }

    public function destroy(MusteriTalepZamani $musteriTalepZamani)
    {
        abort_if(Gate::denies('musteri_talep_zamani_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteriTalepZamani->delete();

        return back();
    }

    public function massDestroy(MassDestroyMusteriTalepZamaniRequest $request)
    {
        MusteriTalepZamani::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
