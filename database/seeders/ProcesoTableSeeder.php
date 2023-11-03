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

        $proceso = new Proceso();
        $proceso->nombre = "Facturacion";
        $proceso->prefijo = "FAC";
        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = "Contabilidad";
        $proceso->prefijo = "CON";
        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = "Produccion";
        $proceso->prefijo = "PRO";
        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = "Logistica";
        $proceso->prefijo = "LOG";
        $proceso->save();
    }
}
