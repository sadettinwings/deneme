@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.musteriAsamalari.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-asamalaris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriAsamalari.fields.id') }}
                        </th>
                        <td>
                            {{ $musteriAsamalari->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.musteriAsamalari.fields.asamaadi') }}
                        </th>
                        <td>
                            {{ $musteriAsamalari->asamaadi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.musteri-asamalaris.index') }}">
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
            <a class="nav-link" href="#talep_asama_bilgi_talepleris" role="tab" data-toggle="tab">
                {{ trans('cruds.bilgiTalepleri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="talep_asama_bilgi_talepleris">
            @includeIf('admin.musteriAsamalaris.relationships.talepAsamaBilgiTalepleris', ['bilgiTalepleris' => $musteriAsamalari->talepAsamaBilgiTalepleris])
        </div>
    </div>
</div>

@endsection