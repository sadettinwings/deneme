@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bilgiTalepleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bilgi-talepleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.id') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.musteri_kaynagi') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->musteri_kaynagi->kaynakadi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.instagram_kullanici_adi') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->instagram_kullanici_adi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.musteri_adi') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->musteri_adi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.telefon') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->telefon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.mail') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->mail }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.zaman') }}
                        </th>
                        <td>
                            @foreach($bilgiTalepleri->zamen as $key => $zaman)
                                <span class="label label-info">{{ $zaman->talep_ettigi_zaman }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.giris') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->giris }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.cikis') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->cikis }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.tarihler_esnek_mi') }}
                        </th>
                        <td>
                            {{ App\Models\BilgiTalepleri::TARIHLER_ESNEK_MI_SELECT[$bilgiTalepleri->tarihler_esnek_mi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.kisi_sayisi') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->kisi_sayisi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.tesis_tipi') }}
                        </th>
                        <td>
                            {{ App\Models\BilgiTalepleri::TESIS_TIPI_SELECT[$bilgiTalepleri->tesis_tipi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.villa_ozellik') }}
                        </th>
                        <td>
                            @foreach($bilgiTalepleri->villa_ozelliks as $key => $villa_ozellik)
                                <span class="label label-info">{{ $villa_ozellik->ozellikadi }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.villa_turu_sec') }}
                        </th>
                        <td>
                            @foreach($bilgiTalepleri->villa_turu_secs as $key => $villa_turu_sec)
                                <span class="label label-info">{{ $villa_turu_sec->tur_adi }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.bolge_sec') }}
                        </th>
                        <td>
                            @foreach($bilgiTalepleri->bolge_secs as $key => $bolge_sec)
                                <span class="label label-info">{{ $bolge_sec->bolgeadi }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.min') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->min }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.max') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.iletisim_tipi') }}
                        </th>
                        <td>
                            {{ App\Models\BilgiTalepleri::ILETISIM_TIPI_SELECT[$bilgiTalepleri->iletisim_tipi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.iletisim_zamani') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->iletisim_zamani }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.not_ekle') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->not_ekle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.rezervasyon_no') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->rezervasyon_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talep_asama') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->talep_asama->asamaadi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talebi_sorumlusu') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->talebi_sorumlusu->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talebi_alan') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->talebi_alan->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bilgiTalepleri.fields.talep_statu') }}
                        </th>
                        <td>
                            {{ $bilgiTalepleri->talep_statu->statu_adi ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bilgi-talepleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#musteri_sec2_gorusmelers" role="tab" data-toggle="tab">
                {{ trans('cruds.gorusmeler.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#talep_sec_hatirlaticis" role="tab" data-toggle="tab">
                {{ trans('cruds.hatirlatici.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="musteri_sec2_gorusmelers">
            @includeIf('admin.bilgiTalepleris.relationships.musteriSec2Gorusmelers', ['gorusmelers' => $bilgiTalepleri->musteriSec2Gorusmelers])
        </div>
        <div class="tab-pane" role="tabpanel" id="talep_sec_hatirlaticis">
            @includeIf('admin.bilgiTalepleris.relationships.talepSecHatirlaticis', ['hatirlaticis' => $bilgiTalepleri->talepSecHatirlaticis])
        </div>
    </div>
</div>

@endsection