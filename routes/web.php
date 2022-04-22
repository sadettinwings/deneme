<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Musteri Talep Zamani
    Route::delete('musteri-talep-zamanis/destroy', 'MusteriTalepZamaniController@massDestroy')->name('musteri-talep-zamanis.massDestroy');
    Route::resource('musteri-talep-zamanis', 'MusteriTalepZamaniController');

    // Villa Turleri
    Route::delete('villa-turleris/destroy', 'VillaTurleriController@massDestroy')->name('villa-turleris.massDestroy');
    Route::resource('villa-turleris', 'VillaTurleriController');

    // Villa Ozellikleri
    Route::delete('villa-ozellikleris/destroy', 'VillaOzellikleriController@massDestroy')->name('villa-ozellikleris.massDestroy');
    Route::resource('villa-ozellikleris', 'VillaOzellikleriController');

    // Villa Bolgeleri
    Route::delete('villa-bolgeleris/destroy', 'VillaBolgeleriController@massDestroy')->name('villa-bolgeleris.massDestroy');
    Route::resource('villa-bolgeleris', 'VillaBolgeleriController');

    // Musteri Asamalari
    Route::delete('musteri-asamalaris/destroy', 'MusteriAsamalariController@massDestroy')->name('musteri-asamalaris.massDestroy');
    Route::resource('musteri-asamalaris', 'MusteriAsamalariController');

    // Musteri Statuleri
    Route::delete('musteri-statuleris/destroy', 'MusteriStatuleriController@massDestroy')->name('musteri-statuleris.massDestroy');
    Route::resource('musteri-statuleris', 'MusteriStatuleriController');

    // Gorusmeler
    Route::delete('gorusmelers/destroy', 'GorusmelerController@massDestroy')->name('gorusmelers.massDestroy');
    Route::resource('gorusmelers', 'GorusmelerController');

    // Musteri Kaynaklari
    Route::delete('musteri-kaynaklaris/destroy', 'MusteriKaynaklariController@massDestroy')->name('musteri-kaynaklaris.massDestroy');
    Route::resource('musteri-kaynaklaris', 'MusteriKaynaklariController');

    // Bilgi Talepleri
    Route::delete('bilgi-talepleris/destroy', 'BilgiTalepleriController@massDestroy')->name('bilgi-talepleris.massDestroy');
    Route::resource('bilgi-talepleris', 'BilgiTalepleriController');

    // Ssskategori
    Route::delete('ssskategoris/destroy', 'SsskategoriController@massDestroy')->name('ssskategoris.massDestroy');
    Route::resource('ssskategoris', 'SsskategoriController');

    // Sss
    Route::delete('ssses/destroy', 'SssController@massDestroy')->name('ssses.massDestroy');
    Route::resource('ssses', 'SssController');

    // Gorusme Kategori
    Route::delete('gorusme-kategoris/destroy', 'GorusmeKategoriController@massDestroy')->name('gorusme-kategoris.massDestroy');
    Route::resource('gorusme-kategoris', 'GorusmeKategoriController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Hatirlatici
    Route::delete('hatirlaticis/destroy', 'HatirlaticiController@massDestroy')->name('hatirlaticis.massDestroy');
    Route::resource('hatirlaticis', 'HatirlaticiController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
