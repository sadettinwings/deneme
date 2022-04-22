<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSsskategoriRequest;
use App\Http\Requests\UpdateSsskategoriRequest;
use App\Http\Resources\Admin\SsskategoriResource;
use App\Models\Ssskategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SsskategoriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ssskategori_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SsskategoriResource(Ssskategori::all());
    }

    public function store(StoreSsskategoriRequest $request)
    {
        $ssskategori = Ssskategori::create($request->all());

        return (new SsskategoriResource($ssskategori))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ssskategori $ssskategori)
    {
        abort_if(Gate::denies('ssskategori_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SsskategoriResource($ssskategori);
    }

    public function update(UpdateSsskategoriRequest $request, Ssskategori $ssskategori)
    {
        $ssskategori->update($request->all());

        return (new SsskategoriResource($ssskategori))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ssskategori $ssskategori)
    {
        abort_if(Gate::denies('ssskategori_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ssskategori->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
