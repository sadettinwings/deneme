<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Musteri Talep Zamani
    Route::apiResource('musteri-talep-zamanis', 'MusteriTalepZamaniApiController');

    // Gorusmeler
    Route::apiResource('gorusmelers', 'GorusmelerApiController');

    // Musteri Kaynaklari
    Route::apiResource('musteri-kaynaklaris', 'MusteriKaynaklariApiController');

    // Bilgi Talepleri
    Route::apiResource('bilgi-talepleris', 'BilgiTalepleriApiController');

    // Ssskategori
    Route::apiResource('ssskategoris', 'SsskategoriApiController');

    // Sss
    Route::apiResource('ssses', 'SssApiController');

    // Gorusme Kategori
    Route::apiResource('gorusme-kategoris', 'GorusmeKategoriApiController');

    // Hatirlatici
    Route::apiResource('hatirlaticis', 'HatirlaticiApiController');
});
