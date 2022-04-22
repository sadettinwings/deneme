@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.musteriTalepZamani.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.musteri-talep-zamanis.update", [$musteriTalepZamani->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="talep_ettigi_zaman">{{ trans('cruds.musteriTalepZamani.fields.talep_ettigi_zaman') }}</label>
                <input class="form-control {{ $errors->has('talep_ettigi_zaman') ? 'is-invalid' : '' }}" type="text" name="talep_ettigi_zaman" id="talep_ettigi_zaman" value="{{ old('talep_ettigi_zaman', $musteriTalepZamani->talep_ettigi_zaman) }}">
                @if($errors->has('talep_ettigi_zaman'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talep_ettigi_zaman') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.musteriTalepZamani.fields.talep_ettigi_zaman_helper') }}</span>
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