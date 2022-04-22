@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gorusmeler.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gorusmelers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="musteri_sec_2_id">{{ trans('cruds.gorusmeler.fields.musteri_sec_2') }}</label>
                <select class="form-control select2 {{ $errors->has('musteri_sec_2') ? 'is-invalid' : '' }}" name="musteri_sec_2_id" id="musteri_sec_2_id">
                    @foreach($musteri_sec_2s as $id => $entry)
                        <option value="{{ $id }}" {{ old('musteri_sec_2_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('musteri_sec_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('musteri_sec_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gorusmeler.fields.musteri_sec_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorusen_kisi_id">{{ trans('cruds.gorusmeler.fields.gorusen_kisi') }}</label>
                <select class="form-control select2 {{ $errors->has('gorusen_kisi') ? 'is-invalid' : '' }}" name="gorusen_kisi_id" id="gorusen_kisi_id">
                    @foreach($gorusen_kisis as $id => $entry)
                        <option value="{{ $id }}" {{ old('gorusen_kisi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gorusen_kisi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gorusen_kisi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gorusmeler.fields.gorusen_kisi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="not">{{ trans('cruds.gorusmeler.fields.not') }}</label>
                <textarea class="form-control {{ $errors->has('not') ? 'is-invalid' : '' }}" name="not" id="not">{{ old('not') }}</textarea>
                @if($errors->has('not'))
                    <div class="invalid-feedback">
                        {{ $errors->first('not') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gorusmeler.fields.not_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kategori_id">{{ trans('cruds.gorusmeler.fields.kategori') }}</label>
                <select class="form-control select2 {{ $errors->has('kategori') ? 'is-invalid' : '' }}" name="kategori_id" id="kategori_id">
                    @foreach($kategoris as $id => $entry)
                        <option value="{{ $id }}" {{ old('kategori_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gorusmeler.fields.kategori_helper') }}</span>
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