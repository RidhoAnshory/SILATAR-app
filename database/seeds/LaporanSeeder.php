<?php

use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laporan')->insert([
            'Waktu' => '2020-06-03',
            'Lokasi' => 'Manggar',
            'Penjelasan' => 'Ribut',
            'Unggah_Foto' => 'Fotoku',
        ]);
    }
}
