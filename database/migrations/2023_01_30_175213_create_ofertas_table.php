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
        Schema::disableForeignKeyConstraints();
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('idEmpresa')->nullable()->constrained('empresas')->references('id');
            $table->longText('descripcio');
            $table->foreignId('idEstudi')->nullable()->constrained('estudis')->references('id');
            $table->integer('numVacants', false);
            $table->string('curs', 20);
            $table->string('nomContacte', 50);
            $table->string('cognomContacte', 50);
            $table->string('correuContacte', 80);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
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
            $table->dropForeign(['ofertas_idEstudi_foreign']);
            $table->dropColumn('idEstudi');
        });
        Schema::dropIfExists('ofertas');
    }
};
