<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasternilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masternilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->integer('id_penguji')->unsigned();
            $table->foreign('id_penguji')->references('id')->on('penguji');
            $table->string('status_penguji');
            $table->string('nilai_subkat_1');
            $table->string('nilai_subkat_2');
            $table->string('nilai_subkat_3');
            $table->string('nilai_subkat_4');
            $table->string('nilai_subkat_5');
            $table->string('nilai_subkat_6');
            $table->string('nilai_subkat_7');
            $table->string('nilai_subkat_8');
            $table->string('nilai_subkat_9');
            $table->string('nilai_subkat_10');
            $table->string('nilai_subkat_11');
            $table->string('nilai_subkat_12');
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
        Schema::dropIfExists('masternilais');
    }
}
