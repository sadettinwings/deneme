<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHatirlaticiRequest;
use App\Http\Requests\StoreHatirlaticiRequest;
use App\Http\Requests\UpdateHatirlaticiRequest;
use App\Models\BilgiTalepleri;
use App\Models\Hatirlatici;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HatirlaticiController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('hatirlatici_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hatirlatici::with(['talep_sec', 'ilgili_kullanici'])->select(sprintf('%s.*', (new Hatirlatici())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hatirlatici_show';
                $editGate = 'hatirlatici_edit';
                $deleteGate = 'hatirlatici_delete';
                $crudRoutePart = 'hatirlaticis';

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
            $table->addColumn('talep_sec_musteri_adi', function ($row) {
                return $row->talep_sec ? $row->talep_sec->musteri_adi : '';
            });

            $table->editColumn('baslik', function ($row) {
                return $row->baslik ? $row->baslik : '';
            });
            $table->editColumn('detay', function ($row) {
                return $row->detay ? $row->detay : '';
            });
            $table->addColumn('ilgili_kullanici_name', function ($row) {
                return $row->ilgili_kullanici ? $row->ilgili_kullanici->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'talep_sec', 'ilgili_kullanici']);

            return $table->make(true);
        }

        $bilgi_talepleris = BilgiTalepleri::get();
        $users            = User::get();

        return view('admin.hatirlaticis.index', compact('bilgi_talepleris', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('hatirlatici_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talep_secs = BilgiTalepleri::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ilgili_kullanicis = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hatirlaticis.create', compact('ilgili_kullanicis', 'talep_secs'));
    }

    public function store(StoreHatirlaticiRequest $request)
    {
        $hatirlatici = Hatirlatici::create($request->all());

        return redirect()->route('admin.hatirlaticis.index');
    }

    public function edit(Hatirlatici $hatirlatici)
    {
        abort_if(Gate::denies('hatirlatici_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talep_secs = BilgiTalepleri::pluck('musteri_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ilgili_kullanicis = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hatirlatici->load('talep_sec', 'ilgili_kullanici');

        return view('admin.hatirlaticis.edit', compact('hatirlatici', 'ilgili_kullanicis', 'talep_secs'));
    }

    public function update(UpdateHatirlaticiRequest $request, Hatirlatici $hatirlatici)
    {
        $hatirlatici->update($request->all());

        return redirect()->route('admin.hatirlaticis.index');
    }

    public function show(Hatirlatici $hatirlatici)
    {
        abort_if(Gate::denies('hatirlatici_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hatirlatici->load('talep_sec', 'ilgili_kullanici');

        return view('admin.hatirlaticis.show', compact('hatirlatici'));
    }

    public function destroy(Hatirlatici $hatirlatici)
    {
        abort_if(Gate::denies('hatirlatici_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hatirlatici->delete();

        return back();
    }

    public function massDestroy(MassDestroyHatirlaticiRequest $request)
    {
        Hatirlatici::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
