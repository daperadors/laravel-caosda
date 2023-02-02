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
        Schema::create('alumnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 30);
            $table->string('cognoms', 50);
            $table->string('dni', 9);
            $table->string('curs', 20);
            $table->bigInteger('telefon', false);
            $table->string('correu', 50);
            //$table->foreignId('idTutor')->nullable()->constrained('users')->references('id');
            $table->foreignId('idEstudi')->nullable()->constrained('estudis')->references('id');
            $table->boolean('practiques')->default(false);
            $table->string('cv', 255);
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
        Schema::table('alumnes', function(Blueprint $table){
            /*$table->dropForeign(["alumnes_idTutor_foreign"]);
            $table->dropColumn("idTutor");*/
            $table->dropForeign(["alumnes_idEstudi_foreign"]);
            $table->dropColumn("idEstudi");
        });
        Schema::dropIfExists('alumnes');
    }
};
