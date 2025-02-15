<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Books') -> insert([
            'title' => 'El Quijote',
            'author' => 'Miguel de Cervantes',
            'published_year' => 1605
        ]);

        DB::table('Books') -> insert([
            'title' => 'La Celestina',
            'author' => 'Fernando de Rojas',
            'published_year' => 1499
        ]);
    }
}
