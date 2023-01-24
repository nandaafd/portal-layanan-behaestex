<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HakAkses;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'nama_hak_akses' => 'admin'
            ],
            [
                'nama_hak_akses' => 'user'
            ]

            ];
            foreach ($hak_akses as $key => $value) {
                HakAkses::create($value);
            }
    }
}
