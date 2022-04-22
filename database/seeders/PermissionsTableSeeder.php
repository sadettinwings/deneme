<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'musteri_talep_zamani_create',
            ],
            [
                'id'    => 18,
                'title' => 'musteri_talep_zamani_edit',
            ],
            [
                'id'    => 19,
                'title' => 'musteri_talep_zamani_show',
            ],
            [
                'id'    => 20,
                'title' => 'musteri_talep_zamani_delete',
            ],
            [
                'id'    => 21,
                'title' => 'musteri_talep_zamani_access',
            ],
            [
                'id'    => 22,
                'title' => 'villa_turleri_create',
            ],
            [
                'id'    => 23,
                'title' => 'villa_turleri_edit',
            ],
            [
                'id'    => 24,
                'title' => 'villa_turleri_show',
            ],
            [
                'id'    => 25,
                'title' => 'villa_turleri_delete',
            ],
            [
                'id'    => 26,
                'title' => 'villa_turleri_access',
            ],
            [
                'id'    => 27,
                'title' => 'villa_ozellikleri_create',
            ],
            [
                'id'    => 28,
                'title' => 'villa_ozellikleri_edit',
            ],
            [
                'id'    => 29,
                'title' => 'villa_ozellikleri_show',
            ],
            [
                'id'    => 30,
                'title' => 'villa_ozellikleri_delete',
            ],
            [
                'id'    => 31,
                'title' => 'villa_ozellikleri_access',
            ],
            [
                'id'    => 32,
                'title' => 'villa_bolgeleri_create',
            ],
            [
                'id'    => 33,
                'title' => 'villa_bolgeleri_edit',
            ],
            [
                'id'    => 34,
                'title' => 'villa_bolgeleri_show',
            ],
            [
                'id'    => 35,
                'title' => 'villa_bolgeleri_delete',
            ],
            [
                'id'    => 36,
                'title' => 'villa_bolgeleri_access',
            ],
            [
                'id'    => 37,
                'title' => 'musteri_asamalari_create',
            ],
            [
                'id'    => 38,
                'title' => 'musteri_asamalari_edit',
            ],
            [
                'id'    => 39,
                'title' => 'musteri_asamalari_show',
            ],
            [
                'id'    => 40,
                'title' => 'musteri_asamalari_delete',
            ],
            [
                'id'    => 41,
                'title' => 'musteri_asamalari_access',
            ],
            [
                'id'    => 42,
                'title' => 'tanimlamalar_access',
            ],
            [
                'id'    => 43,
                'title' => 'musteri_statuleri_create',
            ],
            [
                'id'    => 44,
                'title' => 'musteri_statuleri_edit',
            ],
            [
                'id'    => 45,
                'title' => 'musteri_statuleri_show',
            ],
            [
                'id'    => 46,
                'title' => 'musteri_statuleri_delete',
            ],
            [
                'id'    => 47,
                'title' => 'musteri_statuleri_access',
            ],
            [
                'id'    => 48,
                'title' => 'gorusmeler_create',
            ],
            [
                'id'    => 49,
                'title' => 'gorusmeler_edit',
            ],
            [
                'id'    => 50,
                'title' => 'gorusmeler_show',
            ],
            [
                'id'    => 51,
                'title' => 'gorusmeler_delete',
            ],
            [
                'id'    => 52,
                'title' => 'gorusmeler_access',
            ],
            [
                'id'    => 53,
                'title' => 'musteri_kaynaklari_create',
            ],
            [
                'id'    => 54,
                'title' => 'musteri_kaynaklari_edit',
            ],
            [
                'id'    => 55,
                'title' => 'musteri_kaynaklari_show',
            ],
            [
                'id'    => 56,
                'title' => 'musteri_kaynaklari_delete',
            ],
            [
                'id'    => 57,
                'title' => 'musteri_kaynaklari_access',
            ],
            [
                'id'    => 58,
                'title' => 'bilgi_talepleri_create',
            ],
            [
                'id'    => 59,
                'title' => 'bilgi_talepleri_edit',
            ],
            [
                'id'    => 60,
                'title' => 'bilgi_talepleri_show',
            ],
            [
                'id'    => 61,
                'title' => 'bilgi_talepleri_delete',
            ],
            [
                'id'    => 62,
                'title' => 'bilgi_talepleri_access',
            ],
            [
                'id'    => 63,
                'title' => 'ssskategori_create',
            ],
            [
                'id'    => 64,
                'title' => 'ssskategori_edit',
            ],
            [
                'id'    => 65,
                'title' => 'ssskategori_show',
            ],
            [
                'id'    => 66,
                'title' => 'ssskategori_delete',
            ],
            [
                'id'    => 67,
                'title' => 'ssskategori_access',
            ],
            [
                'id'    => 68,
                'title' => 'sss_create',
            ],
            [
                'id'    => 69,
                'title' => 'sss_edit',
            ],
            [
                'id'    => 70,
                'title' => 'sss_show',
            ],
            [
                'id'    => 71,
                'title' => 'sss_delete',
            ],
            [
                'id'    => 72,
                'title' => 'sss_access',
            ],
            [
                'id'    => 73,
                'title' => 'gorusme_kategori_create',
            ],
            [
                'id'    => 74,
                'title' => 'gorusme_kategori_edit',
            ],
            [
                'id'    => 75,
                'title' => 'gorusme_kategori_show',
            ],
            [
                'id'    => 76,
                'title' => 'gorusme_kategori_delete',
            ],
            [
                'id'    => 77,
                'title' => 'gorusme_kategori_access',
            ],
            [
                'id'    => 78,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 79,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 80,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 81,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 82,
                'title' => 'hatirlatici_create',
            ],
            [
                'id'    => 83,
                'title' => 'hatirlatici_edit',
            ],
            [
                'id'    => 84,
                'title' => 'hatirlatici_show',
            ],
            [
                'id'    => 85,
                'title' => 'hatirlatici_delete',
            ],
            [
                'id'    => 86,
                'title' => 'hatirlatici_access',
            ],
            [
                'id'    => 87,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
