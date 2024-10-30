<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('categoria'); // Asume que la categoría es una cadena. Ajusta el tipo de dato según sea necesario.
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down()
     {
         Schema::table('productos', function (Blueprint $table) {
             $table->dropColumn('categoria');
         });
     }
};
