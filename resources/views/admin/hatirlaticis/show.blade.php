@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hatirlatici.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hatirlaticis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.id') }}
                        </th>
                        <td>
                            {{ $hatirlatici->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.talep_sec') }}
                        </th>
                        <td>
                            {{ $hatirlatici->talep_sec->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.hatirlatma_zamani') }}
                        </th>
                        <td>
                            {{ $hatirlatici->hatirlatma_zamani }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.baslik') }}
                        </th>
                        <td>
                            {{ $hatirlatici->baslik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.detay') }}
                        </th>
                        <td>
                            {{ $hatirlatici->detay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hatirlatici.fields.ilgili_kullanici') }}
                        </th>
                        <td>
                            {{ $hatirlatici->ilgili_kullanici->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hatirlaticis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection