@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.musteriStatuleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.musteri-statuleris.update", [$musteriStatuleri->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="statu_adi">{{ trans('cruds.musteriStatuleri.fields.statu_adi') }}</label>
                <input class="form-control {{ $errors->has('statu_adi') ? 'is-invalid' : '' }}" type="text" name="statu_adi" id="statu_adi" value="{{ old('statu_adi', $musteriStatuleri->statu_adi) }}">
                @if($errors->has('statu_adi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statu_adi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.musteriStatuleri.fields.statu_adi_helper') }}</span>
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