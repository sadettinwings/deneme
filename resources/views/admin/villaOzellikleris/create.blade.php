@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.villaOzellikleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.villa-ozellikleris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ozellikadi">{{ trans('cruds.villaOzellikleri.fields.ozellikadi') }}</label>
                <input class="form-control {{ $errors->has('ozellikadi') ? 'is-invalid' : '' }}" type="text" name="ozellikadi" id="ozellikadi" value="{{ old('ozellikadi', '') }}">
                @if($errors->has('ozellikadi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ozellikadi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.villaOzellikleri.fields.ozellikadi_helper') }}</span>
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