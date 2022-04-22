<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGorusmelerRequest;
use App\Http\Requests\StoreGorusmelerRequest;
use App\Http\Requests\UpdateGorusmelerRequest;
use App\Models\BilgiTalepleri;
use App\Models\GorusmeKategori;
use App\Models\Gorusmeler;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GorusmelerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('gorusmeler_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Gorusmeler::with(['musteri_sec_2', 'gorusen_kisi', 'kategori'])->select(sprintf('%s.*', (new Gorusmeler())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'gorusmeler_show';
                $editGate = 'gorusmeler_edit';
                $deleteGate = 'gorusmeler_delete';
                $crudRoutePart = 'gorusmelers';

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
            $table->addColumn('musteri_sec_2_musteri_adi', function ($row) {
                return $row->musteri_sec_2 ? $row->musteri_sec_2->musteri_adi : '';
            });

            $table->addColumn('gorusen_kisi_name', function ($row) {
                return $row->gorusen_kisi ? $row->gorusen_kisi->name : '';
            });

            $table->editColumn('not', function ($row) {
                return $row->not ? $row->not : '';
            });
            $table->addColumn('kategori_kategori', function ($row) {
                return $row->kategori ? $row->kategori->kategori : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'musteri_sec_2', 'gorusen_kisi', 'kategori']);

            return $table->make(true);
        }

        $bilgi_talepleris  = BilgiTalepleri::get();
        $users             = User::get();
        $gorusme_kategoris = GorusmeKategori::get();

        return view('admin.gorusmelers.index', compact('bilgi_talepleris', 'users', 'gorusme_kategoris'));
    }

    public function create()
    {
        abort_if(Gate::denies('gorusmeler_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_sec_2s = BilgiTalepleri::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gorusen_kisis = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kategoris = GorusmeKategori::pluck('kategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gorusmelers.create', compact('gorusen_kisis', 'kategoris', 'musteri_sec_2s'));
    }

    public function store(StoreGorusmelerRequest $request)
    {
        $gorusmeler = Gorusmeler::create($request->all());

        return redirect()->route('admin.gorusmelers.index');
    }

    public function edit(Gorusmeler $gorusmeler)
    {
        abort_if(Gate::denies('gorusmeler_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_sec_2s = BilgiTalepleri::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kategoris = GorusmeKategori::pluck('kategori', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gorusmeler->load('musteri_sec_2', 'gorusen_kisi', 'kategori');

        return view('admin.gorusmelers.edit', compact('gorusmeler', 'kategoris', 'musteri_sec_2s'));
    }

    public function update(UpdateGorusmelerRequest $request, Gorusmeler $gorusmeler)
    {
        $gorusmeler->update($request->all());

        return redirect()->route('admin.gorusmelers.index');
    }

    public function show(Gorusmeler $gorusmeler)
    {
        abort_if(Gate::denies('gorusmeler_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeler->load('musteri_sec_2', 'gorusen_kisi', 'kategori');

        return view('admin.gorusmelers.show', compact('gorusmeler'));
    }

    public function destroy(Gorusmeler $gorusmeler)
    {
        abort_if(Gate::denies('gorusmeler_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gorusmeler->delete();

        return back();
    }

    public function massDestroy(MassDestroyGorusmelerRequest $request)
    {
        Gorusmeler::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
