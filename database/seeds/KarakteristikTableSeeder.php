<?php

use Illuminate\Database\Seeder;

class KarakteristikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Functional Suitability',
            'k_bobot' => 0.21,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Performance Efficiency',
            'k_bobot' => 0.24,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Compatibility',
            'k_bobot' => 0.05,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Usability',
            'k_bobot' => 0.12,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Reliability',
            'k_bobot' => 0.08,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Security',
            'k_bobot' => 0.20,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Maintainability',
            'k_bobot' => 0.05,
            'k_nilai' => 0
        ]);
        \App\Karakteristik::create([
            'a_id'  => 1,
            'k_nama' => 'Portability',
            'k_bobot' => 0.05,
            'k_nilai' => 0
        ]);
    }
}
