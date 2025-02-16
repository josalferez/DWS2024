<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('books')->insert([
            'title' => 'The Catcher in the Rye',
            'published_year' => 1951,
        ]);
        DB::table('books')->insert([
            'title' => 'The Catcher in the Rye2',
            'published_year' => 1951,
        ]);
        DB::table('books')->insert([
            'title' => 'The Catcher in the Rye3',
            'published_year' => 1951,
        ]);
        DB::table('books')->insert([
            'title' => 'The Catcher in the Rye4',
            'published_year' => 1951,
        ]);
    }
}
