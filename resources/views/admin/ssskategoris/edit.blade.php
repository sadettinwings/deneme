@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ssskategori.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ssskategoris.update", [$ssskategori->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="s_kategori_adi">{{ trans('cruds.ssskategori.fields.s_kategori_adi') }}</label>
                <input class="form-control {{ $errors->has('s_kategori_adi') ? 'is-invalid' : '' }}" type="text" name="s_kategori_adi" id="s_kategori_adi" value="{{ old('s_kategori_adi', $ssskategori->s_kategori_adi) }}">
                @if($errors->has('s_kategori_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('s_kategori_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ssskategori.fields.s_kategori_adi_helper') }}</span>
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