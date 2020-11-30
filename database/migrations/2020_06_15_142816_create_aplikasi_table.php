<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('aplikasi', function (Blueprint $table) {
            $table->increments('a_id')->unique();
            $table->integer('id')->unsigned();
            $table->string('a_nama');
            $table->string('a_url');
            $table->float('a_total');
            $table->timestamps();
        });
        Schema::table('aplikasi', function($table){
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('aplikasi');
    }
}
