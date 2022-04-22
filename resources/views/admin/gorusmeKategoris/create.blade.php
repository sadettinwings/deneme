@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gorusmeKategori.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gorusme-kategoris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kategori">{{ trans('cruds.gorusmeKategori.fields.kategori') }}</label>
                <input class="form-control {{ $errors->has('kategori') ? 'is-invalid' : '' }}" type="text" name="kategori" id="kategori" value="{{ old('kategori', '') }}">
                @if($errors->has('kategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gorusmeKategori.fields.kategori_helper') }}</span>
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