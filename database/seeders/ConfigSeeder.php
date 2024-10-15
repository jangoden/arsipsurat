<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Config::insert([
            [
                'code' => 'default_password',
                'value' => 'admin',
            ],
            [
                'code' => 'page_size',
                'value' => '25',
            ],
            [
                'code' => 'app_name',
                'value' => 'Aplikasi Surat Menyurat',
            ],
            [
                'code' => 'institution_name',
                'value' => 'KPU KABUPATEN CIAMIS',
            ],
            [
                'code' => 'institution_address',
                'value' => 'Jl. Jend. Sudirman No.43, Ciamis, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46211',
            ],
            [
                'code' => 'institution_phone',
                'value' => '081324232824',
            ],
            [
                'code' => 'institution_email',
                'value' => 'admin@admin.com',
            ],
            [
                'code' => 'language',
                'value' => 'id',
            ],
            [
                'code' => 'pic',
                'value' => 'Jang Oden',
            ],
        ]);
    }
}
