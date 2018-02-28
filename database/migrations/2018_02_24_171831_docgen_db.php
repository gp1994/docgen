<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocgenDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user', function (Blueprint $table) {
          $table->increments('id');
          $table->string('peng', 32);
          $table->string('usrn', 32);
          $table->string('roles',5);
          $table->string('email', 320);
          $table->string('pwd', 64);
          $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',40);
            $table->integer('id_pengguna')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('documents', function (Blueprint $table){
            
            $table->foreign('id_pengguna')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('document_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_content');
            $table->integer('deleted');
            $table->string('judul',40);
            $table->text('isi')->nullable();
            $table->integer('id_document')->unsigned();
            $table->integer('urutan');
            $table->string('tipe',40);
            $table->timestamps();
        });

        Schema::table('document_contents', function (Blueprint $table){
            
            $table->foreign('id_document')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
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
    }
}
