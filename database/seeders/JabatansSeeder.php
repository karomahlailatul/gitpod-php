<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jabatans = [
            ["nama" => "Manager"],
            ["nama" => "Supervisor"],
            ["nama" => "Staff"]
        ];

        foreach ($jabatans as $jabatan) {
            DB::table("jabatans")->insert($jabatan);
        };
    }
}
