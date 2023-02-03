<?php

namespace Database\Seeders;

use App\Models\MasterInventaris;
use Illuminate\Database\Seeder;

class MasterInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master_inventaris = [
            ['nama_barang' => 'Laptop'],
            ['nama_barang' => 'Proyektor'],
            ['nama_barang' => 'Scanner Barcode'],
            ['nama_barang' => 'Tablet'],
            ['nama_barang' => 'Kabel HDMI'],
            ['nama_barang' => 'HDD Caddie'],
            ['nama_barang' => 'Converter HDMI to VGA'],
            ['nama_barang' => 'Converter VGA to HDMI'],
            ['nama_barang' => 'Charger Laptop'],
            ['nama_barang' => 'Keyboard'],
            ['nama_barang' => 'RJ45 Converter'],
            ['nama_barang' => 'Flashdisk'],
        ];
        foreach ($master_inventaris as $key => $value) {
            MasterInventaris::create($value);
        }
    }
}
