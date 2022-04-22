@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gorusmeler.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gorusmelers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.id') }}
                        </th>
                        <td>
                            {{ $gorusmeler->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.musteri_sec_2') }}
                        </th>
                        <td>
                            {{ $gorusmeler->musteri_sec_2->musteri_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.gorusen_kisi') }}
                        </th>
                        <td>
                            {{ $gorusmeler->gorusen_kisi->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.not') }}
                        </th>
                        <td>
                            {{ $gorusmeler->not }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gorusmeler.fields.kategori') }}
                        </th>
                        <td>
                            {{ $gorusmeler->kategori->kategori ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gorusmelers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection