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
        Schema::create('enviaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('alumne_id')->nullable()->constrained('alumnes')->references('id');
            $table->foreignId('oferta_id')->nullable()->constrained('ofertas')->references('id');
            $table->longText('observacions');
            $table->string('estatEnviaments', 50);
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
        Schema::table('enviaments', function(Blueprint $table){
            $table->dropForeign(["enviaments_alumne_id_foreign"]);
            $table->dropColumn("alumne_id");
            $table->dropForeign(["enviaments_oferta_id_foreign"]);
            $table->dropColumn("oferta_id");
        });
        Schema::dropIfExists('enviaments');
    }
};
