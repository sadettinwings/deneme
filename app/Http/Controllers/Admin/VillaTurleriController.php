<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVillaTurleriRequest;
use App\Http\Requests\StoreVillaTurleriRequest;
use App\Http\Requests\UpdateVillaTurleriRequest;
use App\Models\VillaTurleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillaTurleriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('villa_turleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaTurleris = VillaTurleri::all();

        return view('admin.villaTurleris.index', compact('villaTurleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('villa_turleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaTurleris.create');
    }

    public function store(StoreVillaTurleriRequest $request)
    {
        $villaTurleri = VillaTurleri::create($request->all());

        return redirect()->route('admin.villa-turleris.index');
    }

    public function edit(VillaTurleri $villaTurleri)
    {
        abort_if(Gate::denies('villa_turleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.villaTurleris.edit', compact('villaTurleri'));
    }

    public function update(UpdateVillaTurleriRequest $request, VillaTurleri $villaTurleri)
    {
        $villaTurleri->update($request->all());

        return redirect()->route('admin.villa-turleris.index');
    }

    public function show(VillaTurleri $villaTurleri)
    {
        abort_if(Gate::denies('villa_turleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaTurleri->load('villaTuruSecBilgiTalepleris');

        return view('admin.villaTurleris.show', compact('villaTurleri'));
    }

    public function destroy(VillaTurleri $villaTurleri)
    {
        abort_if(Gate::denies('villa_turleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $villaTurleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyVillaTurleriRequest $request)
    {
        VillaTurleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
