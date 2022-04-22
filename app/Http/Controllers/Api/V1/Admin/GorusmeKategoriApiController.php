<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGorusmeKategoriRequest;
use App\Http\Requests\UpdateGorusmeKategoriRequest;
use App\Http\Resources\Admin\GorusmeKategoriResource;
use App\Models\GorusmeKategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GorusmeKategoriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gorusme_kategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GorusmeKategoriResource(GorusmeKategori::all());
    }

    public function store(StoreGorusmeKategoriRequest $request)
    {
        $gorusmeKategori = GorusmeKategori::create($request->all());

        return (new GorusmeKategoriResource($gorusmeKategori))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GorusmeKategori $gorusmeKategori)
    {
        abort_if(Gate::denies('gorusme_kategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GorusmeKategoriResource($gorusmeKategori);
    }

    public function update(UpdateGorusmeKategoriRequest $request, GorusmeKategori $gorusmeKategori)
    {
        $gorusmeKategori->update($request->all());

        return (new GorusmeKategoriResource($gorusmeKategori))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GorusmeKategori $gorusmeKategori)
    {
        abort_if(Gate::denies('gorusme_kategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeKategori->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
