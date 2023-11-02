<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Proceso;
use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documento = new Documento();
        $documento->nombre = "INSTRUCTIVO DE DESARROLLO";
        $documento->codigo = "1";
        $documento->contenido = "CONTENIDO DEL DOCUMENTO";
        $documento->tipo_id = "1";
        $documento->proceso_id = "1";
        $documento->save();
    }
}
