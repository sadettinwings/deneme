@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.villaBolgeleri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.villa-bolgeleris.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bolgeadi">{{ trans('cruds.villaBolgeleri.fields.bolgeadi') }}</label>
                <input class="form-control {{ $errors->has('bolgeadi') ? 'is-invalid' : '' }}" type="text" name="bolgeadi" id="bolgeadi" value="{{ old('bolgeadi', '') }}">
                @if($errors->has('bolgeadi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bolgeadi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.villaBolgeleri.fields.bolgeadi_helper') }}</span>
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