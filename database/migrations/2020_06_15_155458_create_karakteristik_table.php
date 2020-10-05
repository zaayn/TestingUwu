<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKarakteristikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karakteristik', function (Blueprint $table) {
            $table->increments('k_id')->unique();
            $table->integer('a_id')->unsigned();
            $table->string('k_nama');
            $table->float('k_bobot');
            $table->float('nilai');
        });
        Schema::table('karakteristik', function($table){
            $table->foreign('a_id')
                ->references('a_id')
                ->on('aplikasi')
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
        Schema::dropIfExists('karakteristik');
    }
}
