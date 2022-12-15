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
        Schema::create('telepon', function (Blueprint $table) {
            
            
            $table->bigInteger('pengguna_id')
            ->unsigned();
            $table->string('nomortelepon')->unique();
            $table->timestamps();
            $table->foreign('pengguna_id')
            ->references('id')->on('pengguna') // id yang didapat dari table pegawai.
              ->onDelete('cascade')
              ->onUpdate('cascade');
           
                 
           
           
            // $table->varchar('nomortelepon');
            // $table->bigInteger('pengguna_id')->unsigned()->primary('pengguna_id');
            // $table->timestamps();
            // $table->foreign('pengguna_id')
            // ->references('id')->on('pengguna') // id yang didapat dari table siswa.
            //   ->onDelete('cascade')
            //   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telepon');
    }
};
