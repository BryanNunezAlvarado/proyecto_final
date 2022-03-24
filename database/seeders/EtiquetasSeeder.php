<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etiqueta::create(['etiqueta' => 'Normal']);
        Etiqueta::create(['etiqueta' => 'Oferta']);
        Etiqueta::create(['etiqueta' => 'Agotado']);
        Etiqueta::create(['etiqueta' => 'Ultimas unidades']);
        
    }
}
