<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantidadProdVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ventas', function (Blueprint $table) {
            $table->integer('cantidad_ven')->after('descripcion_ven');
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
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropColumn('cantidad_ven');
        });
    }
}
