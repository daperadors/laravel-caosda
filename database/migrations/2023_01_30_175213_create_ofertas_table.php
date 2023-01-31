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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('idEmpresa')->nullable()->constrained('empresas')->references('id');
            $table->longText('descripcio');
            $table->foreignId('idCicle')->nullable()->constrained('estudis')->references('id');
            $table->integer('numVacants');
            $table->string('curs');
            $table->string('nomContacte');
            $table->string('cognomContacte');
            $table->string('correuContacte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropForeign(['ofertas_idEmpresa_foreign']);
            $table->dropColumn('idEmpresa');
            $table->dropForeign(['ofertas_idCicle_foreign']);
            $table->dropColumn('idCicle');
        });
        Schema::dropIfExists('ofertas');
    }
};
