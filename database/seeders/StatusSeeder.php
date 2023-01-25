<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = [
            ['nama_status' => 'Accepted'],
            ['nama_status' => 'Approved'],
            ['nama_status' => 'Waiting'],
            ['nama_status' => 'End'],
            ['nama_status' => 'Declined'],
            ['nama_status' => 'Canceled']
        ];
       foreach ($status as $key => $value) {
        Status::create($value);
       } 
    }
    
}
