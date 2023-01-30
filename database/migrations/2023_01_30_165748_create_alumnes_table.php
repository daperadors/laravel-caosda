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
        Schema::create('alumnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 30);
            $table->string('cognoms', 50);
            $table->string('dni', 9);
            $table->string('curs');
            $table->string('cicle');
            $table->bigInteger('telefon');
            $table->string('correu');
            $table->foreignId('idTutorEmpresa')->nullable()->constrained('empresas')->references('id');
            $table->boolean('practiques');
            $table->string('cv');
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
        Schema::table('alumnes', function(Blueprint $table){
            $table->dropForeign(["alumnes_idTutorEmpresa_foreign"]);
            $table->dropColumn("idTutorEmpresa");
        });
        Schema::dropIfExists('alumnes');
    }
};
