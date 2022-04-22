@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#gorusen_kisi_gorusmelers" role="tab" data-toggle="tab">
                {{ trans('cruds.gorusmeler.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#talebi_alan_bilgi_talepleris" role="tab" data-toggle="tab">
                {{ trans('cruds.bilgiTalepleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#talebi_sorumlusu_bilgi_talepleris" role="tab" data-toggle="tab">
                {{ trans('cruds.bilgiTalepleri.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ilgili_kullanici_hatirlaticis" role="tab" data-toggle="tab">
                {{ trans('cruds.hatirlatici.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="gorusen_kisi_gorusmelers">
            @includeIf('admin.users.relationships.gorusenKisiGorusmelers', ['gorusmelers' => $user->gorusenKisiGorusmelers])
        </div>
        <div class="tab-pane" role="tabpanel" id="talebi_alan_bilgi_talepleris">
            @includeIf('admin.users.relationships.talebiAlanBilgiTalepleris', ['bilgiTalepleris' => $user->talebiAlanBilgiTalepleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="talebi_sorumlusu_bilgi_talepleris">
            @includeIf('admin.users.relationships.talebiSorumlusuBilgiTalepleris', ['bilgiTalepleris' => $user->talebiSorumlusuBilgiTalepleris])
        </div>
        <div class="tab-pane" role="tabpanel" id="ilgili_kullanici_hatirlaticis">
            @includeIf('admin.users.relationships.ilgiliKullaniciHatirlaticis', ['hatirlaticis' => $user->ilgiliKullaniciHatirlaticis])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection