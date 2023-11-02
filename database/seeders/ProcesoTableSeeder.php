<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcesoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proceso = new Proceso();
        $proceso->nombre = "Ingenieria";
        $proceso->prefijo = "ING";
        $proceso->save();
    }
}
