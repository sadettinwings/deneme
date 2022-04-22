@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sss.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ssses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sss.fields.id') }}
                        </th>
                        <td>
                            {{ $sss->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sss.fields.kategori_sec') }}
                        </th>
                        <td>
                            {{ $sss->kategori_sec->s_kategori_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sss.fields.soru') }}
                        </th>
                        <td>
                            {{ $sss->soru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sss.fields.cevap') }}
                        </th>
                        <td>
                            {{ $sss->cevap }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ssses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection