@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hatirlatici.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hatirlaticis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="talep_sec_id">{{ trans('cruds.hatirlatici.fields.talep_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('talep_sec') ? 'is-invalid' : '' }}" name="talep_sec_id" id="talep_sec_id">
                    @foreach($talep_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('talep_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('talep_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talep_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hatirlatici.fields.talep_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hatirlatma_zamani">{{ trans('cruds.hatirlatici.fields.hatirlatma_zamani') }}</label>
                <input class="form-control datetime {{ $errors->has('hatirlatma_zamani') ? 'is-invalid' : '' }}" type="text" name="hatirlatma_zamani" id="hatirlatma_zamani" value="{{ old('hatirlatma_zamani') }}">
                @if($errors->has('hatirlatma_zamani'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hatirlatma_zamani') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hatirlatici.fields.hatirlatma_zamani_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="baslik">{{ trans('cruds.hatirlatici.fields.baslik') }}</label>
                <input class="form-control {{ $errors->has('baslik') ? 'is-invalid' : '' }}" type="text" name="baslik" id="baslik" value="{{ old('baslik', '') }}">
                @if($errors->has('baslik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('baslik') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hatirlatici.fields.baslik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detay">{{ trans('cruds.hatirlatici.fields.detay') }}</label>
                <textarea class="form-control {{ $errors->has('detay') ? 'is-invalid' : '' }}" name="detay" id="detay">{{ old('detay') }}</textarea>
                @if($errors->has('detay'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detay') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hatirlatici.fields.detay_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ilgili_kullanici_id">{{ trans('cruds.hatirlatici.fields.ilgili_kullanici') }}</label>
                <select class="form-control select2 {{ $errors->has('ilgili_kullanici') ? 'is-invalid' : '' }}" name="ilgili_kullanici_id" id="ilgili_kullanici_id">
                    @foreach($ilgili_kullanicis as $id => $entry)
                        <option value="{{ $id }}" {{ old('ilgili_kullanici_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ilgili_kullanici'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ilgili_kullanici') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hatirlatici.fields.ilgili_kullanici_helper') }}</span>
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