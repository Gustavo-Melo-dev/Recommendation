<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            "id" => 1,
            "status" => "Iniciado",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('status')->insert([
            "id" => 2,
            "status" => "Em Processo",
            "created_at" => now(),
            "updated_at" => now()
          ]);

        DB::table('status')->insert([
            "id" => 3,
            "status" => "Finalizado",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
