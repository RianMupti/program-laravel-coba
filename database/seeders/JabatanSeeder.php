<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'staff-cleaning',
                'gaji_pokok' => '7000000',
                'tunjangan_jabatan' => '1500000',
                'tunjangan_makan_perhari' => '30000',
                'tunjangan_transport_perhari' => '25000',
            ],
            [
                'nama_jabatan' => 'staff-accounting',
                'gaji_pokok' => '4000000',
                'tunjangan_jabatan' => '1500000',
                'tunjangan_makan_perhari' => '35000',
                'tunjangan_transport_perhari' => '35000',
            ]
        ]);
    }
}
