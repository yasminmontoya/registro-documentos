<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo();
        $tipo->nombre = "Instructivo";
        $tipo->prefijo = "INS";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->nombre = "Requerimiento";
        $tipo->prefijo = "REQ";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->nombre = "Informe";
        $tipo->prefijo = "INF";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->nombre = "Contrato";
        $tipo->prefijo = "CON";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->nombre = "Politica";
        $tipo->prefijo = "POL";
        $tipo->save();
    }
}
