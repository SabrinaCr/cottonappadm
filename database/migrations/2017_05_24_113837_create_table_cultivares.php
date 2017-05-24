<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCultivares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('altura_planta', 45);
            $table->string('fertilidade', 45);
            $table->string('regulador', 45);
            $table->decimal('rendimento_fibra', 8, 2);
            $table->decimal('peso_capulho', 8, 2);
            $table->decimal('comprimento_fibra', 8, 2);
            $table->decimal('micronaire', 8, 2);
            $table->decimal('resistencia', 8, 2);
            $table->decimal('peso_sementes_minimo', 8, 2);
            $table->decimal('peso_sementes_maximo', 8, 2);
            $table->char('status', 1);
            $table->date('data_desativacao');
            $table->integer('cic_id');
            $table->foreign('cic_id')->references('id')->on('ciclos');
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
        Schema::drop('cultivares');
    }
}
