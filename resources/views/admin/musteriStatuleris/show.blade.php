@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.musteriStatuleri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-statuleris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriStatuleri.fields.id') }}
                        </th>
                        <td>
                            {{ $musteriStatuleri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriStatuleri.fields.statu_adi') }}
                        </th>
                        <td>
                            {{ $musteriStatuleri->statu_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-statuleris.index') }}">
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
            <a class="nav-link" href="#talep_statu_bilgi_talepleris" role="tab" data-toggle="tab">
                {{ trans('cruds.bilgiTalepleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="talep_statu_bilgi_talepleris">
            @includeIf('admin.musteriStatuleris.relationships.talepStatuBilgiTalepleris', ['bilgiTalepleris' => $musteriStatuleri->talepStatuBilgiTalepleris])
        </div>
    </div>
</div>

@endsection