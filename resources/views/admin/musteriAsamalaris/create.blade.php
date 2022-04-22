@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.musteriAsamalari.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.musteri-asamalaris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="asamaadi">{{ trans('cruds.musteriAsamalari.fields.asamaadi') }}</label>
                <input class="form-control {{ $errors->has('asamaadi') ? 'is-invalid' : '' }}" type="text" name="asamaadi" id="asamaadi" value="{{ old('asamaadi', '') }}">
                @if($errors->has('asamaadi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asamaadi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.musteriAsamalari.fields.asamaadi_helper') }}</span>
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