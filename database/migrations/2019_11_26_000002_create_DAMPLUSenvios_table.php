<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDAMPLUSenviosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'DAMPLUSenvios';

    /**
     * Run the migrations.
     * @table DAMPLUSenvios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('cedula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('prducto')->nullable();
            $table->string('fecha')->nullable();
            $table->string('incumplido')->nullable();
            $table->string('fecha_incumplido')->nullable();
            $table->string('recordatorio')->nullable();
            $table->string('fecha_recordatorio')->nullable();
            $table->string('pagos')->nullable();
            $table->string('fecha_pagos')->nullable();
            $table->string('dato4')->nullable();

        
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
