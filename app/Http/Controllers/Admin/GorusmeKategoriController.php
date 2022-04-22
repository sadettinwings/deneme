<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGorusmeKategoriRequest;
use App\Http\Requests\StoreGorusmeKategoriRequest;
use App\Http\Requests\UpdateGorusmeKategoriRequest;
use App\Models\GorusmeKategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GorusmeKategoriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gorusme_kategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeKategoris = GorusmeKategori::all();

        return view('admin.gorusmeKategoris.index', compact('gorusmeKategoris'));
    }

    public function create()
    {
        abort_if(Gate::denies('gorusme_kategori_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gorusmeKategoris.create');
    }

    public function store(StoreGorusmeKategoriRequest $request)
    {
        $gorusmeKategori = GorusmeKategori::create($request->all());

        return redirect()->route('admin.gorusme-kategoris.index');
    }

    public function edit(GorusmeKategori $gorusmeKategori)
    {
        abort_if(Gate::denies('gorusme_kategori_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gorusmeKategoris.edit', compact('gorusmeKategori'));
    }

    public function update(UpdateGorusmeKategoriRequest $request, GorusmeKategori $gorusmeKategori)
    {
        $gorusmeKategori->update($request->all());

        return redirect()->route('admin.gorusme-kategoris.index');
    }

    public function show(GorusmeKategori $gorusmeKategori)
    {
        abort_if(Gate::denies('gorusme_kategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeKategori->load('kategoriGorusmelers');

        return view('admin.gorusmeKategoris.show', compact('gorusmeKategori'));
    }

    public function destroy(GorusmeKategori $gorusmeKategori)
    {
        abort_if(Gate::denies('gorusme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeKategori->delete();

        return back();
    }

    public function massDestroy(MassDestroyGorusmeKategoriRequest $request)
    {
        GorusmeKategori::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
