@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.musteriTalepZamani.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-talep-zamanis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriTalepZamani.fields.id') }}
                        </th>
                        <td>
                            {{ $musteriTalepZamani->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriTalepZamani.fields.talep_ettigi_zaman') }}
                        </th>
                        <td>
                            {{ $musteriTalepZamani->talep_ettigi_zaman }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-talep-zamanis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#zaman_bilgi_talepleris" role="tab" data-toggle="tab">
                {{ trans('cruds.bilgiTalepleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="zaman_bilgi_talepleris">
            @includeIf('admin.musteriTalepZamanis.relationships.zamanBilgiTalepleris', ['bilgiTalepleris' => $musteriTalepZamani->zamanBilgiTalepleris])
        </div>
    </div>
</div>

@endsection