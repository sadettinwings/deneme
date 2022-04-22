@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bilgiTalepleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bilgi-talepleris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="musteri_kaynagi_id">{{ trans('cruds.bilgiTalepleri.fields.musteri_kaynagi') }}</label>
                <select class="form-control select2 {{ $errors->has('musteri_kaynagi') ? 'is-invalid' : '' }}" name="musteri_kaynagi_id" id="musteri_kaynagi_id">
                    @foreach($musteri_kaynagis as $id => $entry)
                        <option value="{{ $id }}" {{ old('musteri_kaynagi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('musteri_kaynagi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_kaynagi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.musteri_kaynagi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_kullanici_adi">{{ trans('cruds.bilgiTalepleri.fields.instagram_kullanici_adi') }}</label>
                <input class="form-control {{ $errors->has('instagram_kullanici_adi') ? 'is-invalid' : '' }}" type="text" name="instagram_kullanici_adi" id="instagram_kullanici_adi" value="{{ old('instagram_kullanici_adi', '') }}">
                @if($errors->has('instagram_kullanici_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram_kullanici_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.instagram_kullanici_adi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="musteri_adi">{{ trans('cruds.bilgiTalepleri.fields.musteri_adi') }}</label>
                <input class="form-control {{ $errors->has('musteri_adi') ? 'is-invalid' : '' }}" type="text" name="musteri_adi" id="musteri_adi" value="{{ old('musteri_adi', '') }}" required>
                @if($errors->has('musteri_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.musteri_adi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefon">{{ trans('cruds.bilgiTalepleri.fields.telefon') }}</label>
                <input class="form-control {{ $errors->has('telefon') ? 'is-invalid' : '' }}" type="text" name="telefon" id="telefon" value="{{ old('telefon', '') }}" required>
                @if($errors->has('telefon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.telefon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mail">{{ trans('cruds.bilgiTalepleri.fields.mail') }}</label>
                <input class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" type="text" name="mail" id="mail" value="{{ old('mail', '') }}">
                @if($errors->has('mail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.mail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zamen">{{ trans('cruds.bilgiTalepleri.fields.zaman') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('zamen') ? 'is-invalid' : '' }}" name="zamen[]" id="zamen" multiple>
                    @foreach($zamen as $id => $zaman)
                        <option value="{{ $id }}" {{ in_array($id, old('zamen', [])) ? 'selected' : '' }}>{{ $zaman }}</option>
                    @endforeach
                </select>
                @if($errors->has('zamen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zamen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.zaman_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="giris">{{ trans('cruds.bilgiTalepleri.fields.giris') }}</label>
                <input class="form-control date {{ $errors->has('giris') ? 'is-invalid' : '' }}" type="text" name="giris" id="giris" value="{{ old('giris') }}">
                @if($errors->has('giris'))
                    <div class="invalid-feedback">
                        {{ $errors->first('giris') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.giris_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cikis">{{ trans('cruds.bilgiTalepleri.fields.cikis') }}</label>
                <input class="form-control date {{ $errors->has('cikis') ? 'is-invalid' : '' }}" type="text" name="cikis" id="cikis" value="{{ old('cikis') }}">
                @if($errors->has('cikis'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cikis') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.cikis_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.bilgiTalepleri.fields.tarihler_esnek_mi') }}</label>
                <select class="form-control {{ $errors->has('tarihler_esnek_mi') ? 'is-invalid' : '' }}" name="tarihler_esnek_mi" id="tarihler_esnek_mi">
                    <option value disabled {{ old('tarihler_esnek_mi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BilgiTalepleri::TARIHLER_ESNEK_MI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tarihler_esnek_mi', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tarihler_esnek_mi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tarihler_esnek_mi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.tarihler_esnek_mi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kisi_sayisi">{{ trans('cruds.bilgiTalepleri.fields.kisi_sayisi') }}</label>
                <input class="form-control {{ $errors->has('kisi_sayisi') ? 'is-invalid' : '' }}" type="text" name="kisi_sayisi" id="kisi_sayisi" value="{{ old('kisi_sayisi', '') }}">
                @if($errors->has('kisi_sayisi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kisi_sayisi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.kisi_sayisi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.bilgiTalepleri.fields.tesis_tipi') }}</label>
                <select class="form-control {{ $errors->has('tesis_tipi') ? 'is-invalid' : '' }}" name="tesis_tipi" id="tesis_tipi">
                    <option value disabled {{ old('tesis_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BilgiTalepleri::TESIS_TIPI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tesis_tipi', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tesis_tipi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tesis_tipi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.tesis_tipi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="villa_ozelliks">{{ trans('cruds.bilgiTalepleri.fields.villa_ozellik') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('villa_ozelliks') ? 'is-invalid' : '' }}" name="villa_ozelliks[]" id="villa_ozelliks" multiple>
                    @foreach($villa_ozelliks as $id => $villa_ozellik)
                        <option value="{{ $id }}" {{ in_array($id, old('villa_ozelliks', [])) ? 'selected' : '' }}>{{ $villa_ozellik }}</option>
                    @endforeach
                </select>
                @if($errors->has('villa_ozelliks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('villa_ozelliks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.villa_ozellik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="villa_turu_secs">{{ trans('cruds.bilgiTalepleri.fields.villa_turu_sec') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('villa_turu_secs') ? 'is-invalid' : '' }}" name="villa_turu_secs[]" id="villa_turu_secs" multiple>
                    @foreach($villa_turu_secs as $id => $villa_turu_sec)
                        <option value="{{ $id }}" {{ in_array($id, old('villa_turu_secs', [])) ? 'selected' : '' }}>{{ $villa_turu_sec }}</option>
                    @endforeach
                </select>
                @if($errors->has('villa_turu_secs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('villa_turu_secs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.villa_turu_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bolge_secs">{{ trans('cruds.bilgiTalepleri.fields.bolge_sec') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('bolge_secs') ? 'is-invalid' : '' }}" name="bolge_secs[]" id="bolge_secs" multiple>
                    @foreach($bolge_secs as $id => $bolge_sec)
                        <option value="{{ $id }}" {{ in_array($id, old('bolge_secs', [])) ? 'selected' : '' }}>{{ $bolge_sec }}</option>
                    @endforeach
                </select>
                @if($errors->has('bolge_secs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bolge_secs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.bolge_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min">{{ trans('cruds.bilgiTalepleri.fields.min') }}</label>
                <input class="form-control {{ $errors->has('min') ? 'is-invalid' : '' }}" type="text" name="min" id="min" value="{{ old('min', '') }}">
                @if($errors->has('min'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.min_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max">{{ trans('cruds.bilgiTalepleri.fields.max') }}</label>
                <input class="form-control {{ $errors->has('max') ? 'is-invalid' : '' }}" type="text" name="max" id="max" value="{{ old('max', '') }}">
                @if($errors->has('max'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.max_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.bilgiTalepleri.fields.iletisim_tipi') }}</label>
                <select class="form-control {{ $errors->has('iletisim_tipi') ? 'is-invalid' : '' }}" name="iletisim_tipi" id="iletisim_tipi">
                    <option value disabled {{ old('iletisim_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BilgiTalepleri::ILETISIM_TIPI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('iletisim_tipi', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('iletisim_tipi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iletisim_tipi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.iletisim_tipi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iletisim_zamani">{{ trans('cruds.bilgiTalepleri.fields.iletisim_zamani') }}</label>
                <input class="form-control datetime {{ $errors->has('iletisim_zamani') ? 'is-invalid' : '' }}" type="text" name="iletisim_zamani" id="iletisim_zamani" value="{{ old('iletisim_zamani') }}">
                @if($errors->has('iletisim_zamani'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iletisim_zamani') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.iletisim_zamani_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="not_ekle">{{ trans('cruds.bilgiTalepleri.fields.not_ekle') }}</label>
                <textarea class="form-control {{ $errors->has('not_ekle') ? 'is-invalid' : '' }}" name="not_ekle" id="not_ekle">{{ old('not_ekle') }}</textarea>
                @if($errors->has('not_ekle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('not_ekle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.not_ekle_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="talebi_sorumlusu_id">{{ trans('cruds.bilgiTalepleri.fields.talebi_sorumlusu') }}</label>
                <select class="form-control select2 {{ $errors->has('talebi_sorumlusu') ? 'is-invalid' : '' }}" name="talebi_sorumlusu_id" id="talebi_sorumlusu_id" required>
                    @foreach($talebi_sorumlusus as $id => $entry)
                        <option value="{{ $id }}" {{ old('talebi_sorumlusu_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('talebi_sorumlusu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talebi_sorumlusu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.talebi_sorumlusu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="talebi_alan_id">{{ trans('cruds.bilgiTalepleri.fields.talebi_alan') }}</label>
                <select class="form-control select2 {{ $errors->has('talebi_alan') ? 'is-invalid' : '' }}" name="talebi_alan_id" id="talebi_alan_id" required>
                    @foreach($talebi_alans as $id => $entry)
                        <option value="{{ $id }}" {{ old('talebi_alan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('talebi_alan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talebi_alan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bilgiTalepleri.fields.talebi_alan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection