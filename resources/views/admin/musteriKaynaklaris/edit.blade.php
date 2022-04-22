@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.musteriKaynaklari.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.musteri-kaynaklaris.update", [$musteriKaynaklari->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="kaynakadi">{{ trans('cruds.musteriKaynaklari.fields.kaynakadi') }}</label>
                <input class="form-control {{ $errors->has('kaynakadi') ? 'is-invalid' : '' }}" type="text" name="kaynakadi" id="kaynakadi" value="{{ old('kaynakadi', $musteriKaynaklari->kaynakadi) }}">
                @if($errors->has('kaynakadi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kaynakadi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.musteriKaynaklari.fields.kaynakadi_helper') }}</span>
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