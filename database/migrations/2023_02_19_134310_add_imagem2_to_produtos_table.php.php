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
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('imagem2');
            $table->string('imagem3');
            $table->string('imagem4');
            $table->string('imagem5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('imagem2');
            $table->dropColumn('imagem3');
            $table->dropColumn('imagem4');
            $table->dropColumn('imagem5');
        });

    }
};
