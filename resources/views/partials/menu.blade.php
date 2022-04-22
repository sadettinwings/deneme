<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('bilgi_talepleri_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.bilgi-talepleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bilgi-talepleris") || request()->is("admin/bilgi-talepleris/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-angle-double-right c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bilgiTalepleri.title') }}
                </a>
            </li>
        @endcan
        @can('gorusmeler_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.gorusmelers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gorusmelers") || request()->is("admin/gorusmelers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-comment-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gorusmeler.title') }}
                </a>
            </li>
        @endcan
        @can('sss_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ssses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ssses") || request()->is("admin/ssses/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sss.title') }}
                </a>
            </li>
        @endcan
        @can('hatirlatici_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.hatirlaticis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hatirlaticis") || request()->is("admin/hatirlaticis/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hatirlatici.title') }}
                </a>
            </li>
        @endcan
        @can('tanimlamalar_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/musteri-talep-zamanis*") ? "c-show" : "" }} {{ request()->is("admin/villa-turleris*") ? "c-show" : "" }} {{ request()->is("admin/villa-ozellikleris*") ? "c-show" : "" }} {{ request()->is("admin/villa-bolgeleris*") ? "c-show" : "" }} {{ request()->is("admin/musteri-asamalaris*") ? "c-show" : "" }} {{ request()->is("admin/musteri-statuleris*") ? "c-show" : "" }} {{ request()->is("admin/musteri-kaynaklaris*") ? "c-show" : "" }} {{ request()->is("admin/ssskategoris*") ? "c-show" : "" }} {{ request()->is("admin/gorusme-kategoris*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tanimlamalar.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('musteri_talep_zamani_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.musteri-talep-zamanis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musteri-talep-zamanis") || request()->is("admin/musteri-talep-zamanis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.musteriTalepZamani.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('villa_turleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.villa-turleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/villa-turleris") || request()->is("admin/villa-turleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.villaTurleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('villa_ozellikleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.villa-ozellikleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/villa-ozellikleris") || request()->is("admin/villa-ozellikleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.villaOzellikleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('villa_bolgeleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.villa-bolgeleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/villa-bolgeleris") || request()->is("admin/villa-bolgeleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.villaBolgeleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('musteri_asamalari_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.musteri-asamalaris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musteri-asamalaris") || request()->is("admin/musteri-asamalaris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.musteriAsamalari.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('musteri_statuleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.musteri-statuleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musteri-statuleris") || request()->is("admin/musteri-statuleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.musteriStatuleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('musteri_kaynaklari_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.musteri-kaynaklaris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musteri-kaynaklaris") || request()->is("admin/musteri-kaynaklaris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.musteriKaynaklari.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ssskategori_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ssskategoris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ssskategoris") || request()->is("admin/ssskategoris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ssskategori.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gorusme_kategori_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.gorusme-kategoris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gorusme-kategoris") || request()->is("admin/gorusme-kategoris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gorusmeKategori.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>