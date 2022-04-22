<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySsskategoriRequest;
use App\Http\Requests\StoreSsskategoriRequest;
use App\Http\Requests\UpdateSsskategoriRequest;
use App\Models\Ssskategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SsskategoriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ssskategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ssskategoris = Ssskategori::all();

        return view('admin.ssskategoris.index', compact('ssskategoris'));
    }

    public function create()
    {
        abort_if(Gate::denies('ssskategori_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ssskategoris.create');
    }

    public function store(StoreSsskategoriRequest $request)
    {
        $ssskategori = Ssskategori::create($request->all());

        return redirect()->route('admin.ssskategoris.index');
    }

    public function edit(Ssskategori $ssskategori)
    {
        abort_if(Gate::denies('ssskategori_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ssskategoris.edit', compact('ssskategori'));
    }

    public function update(UpdateSsskategoriRequest $request, Ssskategori $ssskategori)
    {
        $ssskategori->update($request->all());

        return redirect()->route('admin.ssskategoris.index');
    }

    public function show(Ssskategori $ssskategori)
    {
        abort_if(Gate::denies('ssskategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ssskategori->load('kategoriSecSsses');

        return view('admin.ssskategoris.show', compact('ssskategori'));
    }

    public function destroy(Ssskategori $ssskategori)
    {
        abort_if(Gate::denies('ssskategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ssskategori->delete();

        return back();
    }

    public function massDestroy(MassDestroySsskategoriRequest $request)
    {
        Ssskategori::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
