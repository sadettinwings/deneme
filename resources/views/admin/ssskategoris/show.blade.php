@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ssskategori.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ssskategoris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ssskategori.fields.id') }}
                        </th>
                        <td>
                            {{ $ssskategori->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ssskategori.fields.s_kategori_adi') }}
                        </th>
                        <td>
                            {{ $ssskategori->s_kategori_adi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ssskategoris.index') }}">
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
            <a class="nav-link" href="#kategori_sec_ssses" role="tab" data-toggle="tab">
                {{ trans('cruds.sss.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="kategori_sec_ssses">
            @includeIf('admin.ssskategoris.relationships.kategoriSecSsses', ['ssses' => $ssskategori->kategoriSecSsses])
        </div>
    </div>
</div>

@endsection