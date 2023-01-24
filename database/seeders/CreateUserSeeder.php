<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
           [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama' => 'admin',
            'hak_akses_id' => 1
           ],
           [
            'username' => 'nanda',
            'password' => bcrypt('123456'),
            'nama' => 'nanda',
            'hak_akses_id' => 2
           ]
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
