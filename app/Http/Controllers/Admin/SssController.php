<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySssRequest;
use App\Http\Requests\StoreSssRequest;
use App\Http\Requests\UpdateSssRequest;
use App\Models\Sss;
use App\Models\Ssskategori;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SssController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sss_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sss::with(['kategori_sec'])->select(sprintf('%s.*', (new Sss())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sss_show';
                $editGate = 'sss_edit';
                $deleteGate = 'sss_delete';
                $crudRoutePart = 'ssses';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('kategori_sec_s_kategori_adi', function ($row) {
                return $row->kategori_sec ? $row->kategori_sec->s_kategori_adi : '';
            });

            $table->editColumn('soru', function ($row) {
                return $row->soru ? $row->soru : '';
            });
            $table->editColumn('cevap', function ($row) {
                return $row->cevap ? $row->cevap : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kategori_sec']);

            return $table->make(true);
        }

        $ssskategoris = Ssskategori::get();

        return view('admin.ssses.index', compact('ssskategoris'));
    }

    public function create()
    {
        abort_if(Gate::denies('sss_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategori_secs = Ssskategori::pluck('s_kategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ssses.create', compact('kategori_secs'));
    }

    public function store(StoreSssRequest $request)
    {
        $sss = Sss::create($request->all());

        return redirect()->route('admin.ssses.index');
    }

    public function edit(Sss $sss)
    {
        abort_if(Gate::denies('sss_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kategori_secs = Ssskategori::pluck('s_kategori_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sss->load('kategori_sec');

        return view('admin.ssses.edit', compact('kategori_secs', 'sss'));
    }

    public function update(UpdateSssRequest $request, Sss $sss)
    {
        $sss->update($request->all());

        return redirect()->route('admin.ssses.index');
    }

    public function show(Sss $sss)
    {
        abort_if(Gate::denies('sss_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sss->load('kategori_sec');

        return view('admin.ssses.show', compact('sss'));
    }

    public function destroy(Sss $sss)
    {
        abort_if(Gate::denies('sss_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sss->delete();

        return back();
    }

    public function massDestroy(MassDestroySssRequest $request)
    {
        Sss::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
