<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBilgiTalepleriRequest;
use App\Http\Requests\StoreBilgiTalepleriRequest;
use App\Http\Requests\UpdateBilgiTalepleriRequest;
use App\Models\BilgiTalepleri;
use App\Models\MusteriAsamalari;
use App\Models\MusteriKaynaklari;
use App\Models\MusteriStatuleri;
use App\Models\MusteriTalepZamani;
use App\Models\User;
use App\Models\VillaBolgeleri;
use App\Models\VillaOzellikleri;
use App\Models\VillaTurleri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BilgiTalepleriController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('bilgi_talepleri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BilgiTalepleri::with(['musteri_kaynagi', 'zamen', 'villa_ozelliks', 'villa_turu_secs', 'bolge_secs', 'talep_asama', 'talebi_sorumlusu', 'talebi_alan', 'talep_statu'])->select(sprintf('%s.*', (new BilgiTalepleri())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'bilgi_talepleri_show';
                $editGate = 'bilgi_talepleri_edit';
                $deleteGate = 'bilgi_talepleri_delete';
                $crudRoutePart = 'bilgi-talepleris';

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
            $table->editColumn('musteri_adi', function ($row) {
                return $row->musteri_adi ? $row->musteri_adi : '';
            });
            $table->editColumn('telefon', function ($row) {
                return $row->telefon ? $row->telefon : '';
            });
            $table->editColumn('not_ekle', function ($row) {
                return $row->not_ekle ? $row->not_ekle : '';
            });
            $table->addColumn('talep_asama_asamaadi', function ($row) {
                return $row->talep_asama ? $row->talep_asama->asamaadi : '';
            });

            $table->addColumn('talebi_sorumlusu_name', function ($row) {
                return $row->talebi_sorumlusu ? $row->talebi_sorumlusu->name : '';
            });

            $table->addColumn('talep_statu_statu_adi', function ($row) {
                return $row->talep_statu ? $row->talep_statu->statu_adi : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'talep_asama', 'talebi_sorumlusu', 'talep_statu']);

            return $table->make(true);
        }

        $musteri_kaynaklaris   = MusteriKaynaklari::get();
        $musteri_talep_zamanis = MusteriTalepZamani::get();
        $villa_ozellikleris    = VillaOzellikleri::get();
        $villa_turleris        = VillaTurleri::get();
        $villa_bolgeleris      = VillaBolgeleri::get();
        $musteri_asamalaris    = MusteriAsamalari::get();
        $users                 = User::get();
        $musteri_statuleris    = MusteriStatuleri::get();

        return view('admin.bilgiTalepleris.index', compact('musteri_kaynaklaris', 'musteri_talep_zamanis', 'villa_ozellikleris', 'villa_turleris', 'villa_bolgeleris', 'musteri_asamalaris', 'users', 'musteri_statuleris'));
    }

    public function create()
    {
        abort_if(Gate::denies('bilgi_talepleri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_kaynagis = MusteriKaynaklari::pluck('kaynakadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zamen = MusteriTalepZamani::pluck('talep_ettigi_zaman', 'id');

        $villa_ozelliks = VillaOzellikleri::pluck('ozellikadi', 'id');

        $villa_turu_secs = VillaTurleri::pluck('tur_adi', 'id');

        $bolge_secs = VillaBolgeleri::pluck('bolgeadi', 'id');

        $talebi_sorumlusus = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $talebi_alans = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bilgiTalepleris.create', compact('bolge_secs', 'musteri_kaynagis', 'talebi_alans', 'talebi_sorumlusus', 'villa_ozelliks', 'villa_turu_secs', 'zamen'));
    }

    public function store(StoreBilgiTalepleriRequest $request)
    {
        $bilgiTalepleri = BilgiTalepleri::create($request->all());
        $bilgiTalepleri->zamen()->sync($request->input('zamen', []));
        $bilgiTalepleri->villa_ozelliks()->sync($request->input('villa_ozelliks', []));
        $bilgiTalepleri->villa_turu_secs()->sync($request->input('villa_turu_secs', []));
        $bilgiTalepleri->bolge_secs()->sync($request->input('bolge_secs', []));

        return redirect()->route('admin.bilgi-talepleris.index');
    }

    public function edit(BilgiTalepleri $bilgiTalepleri)
    {
        abort_if(Gate::denies('bilgi_talepleri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $musteri_kaynagis = MusteriKaynaklari::pluck('kaynakadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zamen = MusteriTalepZamani::pluck('talep_ettigi_zaman', 'id');

        $villa_ozelliks = VillaOzellikleri::pluck('ozellikadi', 'id');

        $villa_turu_secs = VillaTurleri::pluck('tur_adi', 'id');

        $bolge_secs = VillaBolgeleri::pluck('bolgeadi', 'id');

        $talep_asamas = MusteriAsamalari::pluck('asamaadi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $talep_status = MusteriStatuleri::pluck('statu_adi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bilgiTalepleri->load('musteri_kaynagi', 'zamen', 'villa_ozelliks', 'villa_turu_secs', 'bolge_secs', 'talep_asama', 'talebi_sorumlusu', 'talebi_alan', 'talep_statu');

        return view('admin.bilgiTalepleris.edit', compact('bilgiTalepleri', 'bolge_secs', 'musteri_kaynagis', 'talep_asamas', 'talep_status', 'villa_ozelliks', 'villa_turu_secs', 'zamen'));
    }

    public function update(UpdateBilgiTalepleriRequest $request, BilgiTalepleri $bilgiTalepleri)
    {
        $bilgiTalepleri->update($request->all());
        $bilgiTalepleri->zamen()->sync($request->input('zamen', []));
        $bilgiTalepleri->villa_ozelliks()->sync($request->input('villa_ozelliks', []));
        $bilgiTalepleri->villa_turu_secs()->sync($request->input('villa_turu_secs', []));
        $bilgiTalepleri->bolge_secs()->sync($request->input('bolge_secs', []));

        return redirect()->route('admin.bilgi-talepleris.index');
    }

    public function show(BilgiTalepleri $bilgiTalepleri)
    {
        abort_if(Gate::denies('bilgi_talepleri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bilgiTalepleri->load('musteri_kaynagi', 'zamen', 'villa_ozelliks', 'villa_turu_secs', 'bolge_secs', 'talep_asama', 'talebi_sorumlusu', 'talebi_alan', 'talep_statu', 'musteriSec2Gorusmelers', 'talepSecHatirlaticis');

        return view('admin.bilgiTalepleris.show', compact('bilgiTalepleri'));
    }

    public function destroy(BilgiTalepleri $bilgiTalepleri)
    {
        abort_if(Gate::denies('bilgi_talepleri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bilgiTalepleri->delete();

        return back();
    }

    public function massDestroy(MassDestroyBilgiTalepleriRequest $request)
    {
        BilgiTalepleri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
