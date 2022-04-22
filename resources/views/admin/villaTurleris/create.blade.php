@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.villaTurleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.villa-turleris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tur_adi">{{ trans('cruds.villaTurleri.fields.tur_adi') }}</label>
                <input class="form-control {{ $errors->has('tur_adi') ? 'is-invalid' : '' }}" type="text" name="tur_adi" id="tur_adi" value="{{ old('tur_adi', '') }}">
                @if($errors->has('tur_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tur_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.villaTurleri.fields.tur_adi_helper') }}</span>
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