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
        $documento->codigo = "INS-ING-1";
        $documento->contenido = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum massa arcu, blandit et eleifend eget, efficitur vitae orci. Maecenas viverra tempor purus vel congue. Ut dignissim tempus nisl eu tristique. Cras quis arcu iaculis arcu volutpat dictum sit amet volutpat mauris. Praesent consequat ornare lacus, eget porttitor sem iaculis in. Proin diam dui, dignissim ut eros ut, scelerisque volutpat nisi. Sed rhoncus commodo augue, eu faucibus ipsum ultrices sit amet. Mauris sed blandit elit. Morbi euismod ligula consequat diam aliquam, et condimentum eros blandit.";
        $documento->tipo_id = "1";
        $documento->proceso_id = "1";
        $documento->save();
    }
}
