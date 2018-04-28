<?php

use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::create([
            'name' => 'Daffa Akbar',
            'username' => 'daffa',
            'password' => bcrypt('d4ff44kb4r')
        ]);
    }
}
