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
        Schema::create('enviaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->foreign('oferta_id')->references('id')->on('ofertas')->onDelete('cascade');
            $table->longText('observacions');
            $table->string('estatEnviaments', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enviaments', function(Blueprint $table){
            $table->dropForeign(["enviaments_alumne_id_foreign"]);
            $table->dropColumn("alumne_id");
            $table->dropForeign(["enviaments_oferta_id_foreign"]);
            $table->dropColumn("oferta_id");
        });
        Schema::dropIfExists('enviaments');
    }
};
