@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gorusmeKategori.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gorusme-kategoris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeKategori.fields.id') }}
                        </th>
                        <td>
                            {{ $gorusmeKategori->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeKategori.fields.kategori') }}
                        </th>
                        <td>
                            {{ $gorusmeKategori->kategori }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gorusme-kategoris.index') }}">
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
            <a class="nav-link" href="#kategori_gorusmelers" role="tab" data-toggle="tab">
                {{ trans('cruds.gorusmeler.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kategori_gorusmelers">
            @includeIf('admin.gorusmeKategoris.relationships.kategoriGorusmelers', ['gorusmelers' => $gorusmeKategori->kategoriGorusmelers])
        </div>
    </div>
</div>

@endsection