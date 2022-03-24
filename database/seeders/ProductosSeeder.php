<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'user_id' => '1',
            'nombre' => 'cacahuates',
            'precio' => '15',
            'tipo' => 'snacks',
            'url' => 'https://imagenes.elpais.com/resizer/ZDBbevniCA5LT-TvUOLCWgzAZ9E=/1960x1103/cloudfront-eu-central-1.images.arcpublishing.com/prisa/HE3SMC3L7Z7XENXLHLLKE3CDEA.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
