<?php

use Illuminate\Database\Seeder;

class SubkarakteristikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subkarakteristik::create([
            'k_id'  => 1,
            'sk_nama' => 'Functional Completeness',
            'bobot_relatif' => 0.37
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 1,
            'sk_nama' => 'Functional Correctness',
            'bobot_relatif' => 0.32
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 1,
            'sk_nama' => 'Functional Appropriateness',
            'bobot_relatif' => 0.31
        ]);
        
        \App\Subkarakteristik::create([
            'k_id'  => 2,
            'sk_nama' => 'Time Behaviour',
            'bobot_relatif' => 0.40
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 2,
            'sk_nama' => 'Resource Utilization',
            'bobot_relatif' => 0.20
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 2,
            'sk_nama' => 'Capacity',
            'bobot_relatif' => 0.40
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 3,
            'sk_nama' => 'Co-Existence',
            'bobot_relatif' => 0.45
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 3,
            'sk_nama' => 'Interoperability',
            'bobot_relatif' => 0.55
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'Appropriateness Recognizability',
            'bobot_relatif' => 0.19
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'Learnability',
            'bobot_relatif' => 0.15
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'Operability',
            'bobot_relatif' => 0.22
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'User Error Protection',
            'bobot_relatif' => 0.16
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'User Interface Aesthetics',
            'bobot_relatif' => 0.08
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 4,
            'sk_nama' => 'Accessibility',
            'bobot_relatif' => 0.20
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 5,
            'sk_nama' => 'Maturity',
            'bobot_relatif' => 0.20
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 5,
            'sk_nama' => 'Availability',
            'bobot_relatif' => 0.25
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 5,
            'sk_nama' => 'Fault-Tolerance',
            'bobot_relatif' => 0.30
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 5,
            'sk_nama' => 'Recoverability',
            'bobot_relatif' => 0.25
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 6,
            'sk_nama' => 'Confidentiality',
            'bobot_relatif' => 0.15
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 6,
            'sk_nama' => 'Integrity',
            'bobot_relatif' => 0.25
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 6,
            'sk_nama' => 'Non-repudiation',
            'bobot_relatif' => 0.15
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 6,
            'sk_nama' => 'Authenticity',
            'bobot_relatif' => 0.25
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 6,
            'sk_nama' => 'Accountability',
            'bobot_relatif' => 0.20
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 7,
            'sk_nama' => 'Modularity',
            'bobot_relatif' => 0.15
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 7,
            'sk_nama' => 'Reusability',
            'bobot_relatif' => 0.25
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 7,
            'sk_nama' => 'Analysability',
            'bobot_relatif' => 0.15
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 7,
            'sk_nama' => 'Modifiability',
            'bobot_relatif' => 0.25
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 7,
            'sk_nama' => 'Testability',
            'bobot_relatif' => 0.20
        ]);

        \App\Subkarakteristik::create([
            'k_id'  => 8,
            'sk_nama' => 'Adaptability',
            'bobot_relatif' => 0.32
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 8,
            'sk_nama' => 'Installability',
            'bobot_relatif' => 0.27
        ]);
        \App\Subkarakteristik::create([
            'k_id'  => 8,
            'sk_nama' => 'Replaceability',
            'bobot_relatif' => 0.41
        ]);
    }
}
