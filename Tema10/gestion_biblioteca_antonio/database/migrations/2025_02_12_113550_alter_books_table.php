<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id') -> nullable(); //por defecto le asigna null a la columna author_id
            $table->foreign('author_id') -> references('id') -> on('authors')-> onDelete('set null'); //crea una clave foranea en la columna author_id que hace referencia a la columna id de la tabla authors
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
