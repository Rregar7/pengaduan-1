<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'nik' => '647403170305001',
                'nama' => 'Esra Fernanda Siregar',
                'username' => 'esra',
                'telp' => '123',
                'password' => bcrypt('11111111'),
            ],
        ];
        Masyarakat::insert($arr);
    }
}
