@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sss.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ssses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kategori_sec_id">{{ trans('cruds.sss.fields.kategori_sec') }}</label>
                <select class="form-control select2 {{ $errors->has('kategori_sec') ? 'is-invalid' : '' }}" name="kategori_sec_id" id="kategori_sec_id">
                    @foreach($kategori_secs as $id => $entry)
                        <option value="{{ $id }}" {{ old('kategori_sec_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_sec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori_sec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sss.fields.kategori_sec_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="soru">{{ trans('cruds.sss.fields.soru') }}</label>
                <input class="form-control {{ $errors->has('soru') ? 'is-invalid' : '' }}" type="text" name="soru" id="soru" value="{{ old('soru', '') }}">
                @if($errors->has('soru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('soru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sss.fields.soru_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cevap">{{ trans('cruds.sss.fields.cevap') }}</label>
                <textarea class="form-control {{ $errors->has('cevap') ? 'is-invalid' : '' }}" name="cevap" id="cevap">{{ old('cevap') }}</textarea>
                @if($errors->has('cevap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cevap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sss.fields.cevap_helper') }}</span>
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