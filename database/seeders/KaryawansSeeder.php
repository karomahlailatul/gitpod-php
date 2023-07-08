<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jabatans = DB::table("jabatans")->get();

        $karyawans =[
            [
                "nama" => "Budi",
                "alamat" => "Jalan Setia Budi No.1",
                "tanggal_lahir" => "1990-01-01",
                "jabatans_id" => $jabatans[0]->id
            ],
            [
                "nama" => "Isma",
                "alamat" => "Jalan Simo No.2",
                "tanggal_lahir" => "1992-01-01",
                "jabatans_id" => $jabatans[0]->id
            ],
            [
                "nama" => "Budi Isma",
                "alamat" => "Jalan Budi No.1",
                "tanggal_lahir" => "1993-01-01",
                "jabatans_id" => $jabatans[0]->id
            ],

        ];

        foreach ($karyawans as $karyawan){
            DB::table("karyawans")->insert($karyawan);
        }

    }
}
