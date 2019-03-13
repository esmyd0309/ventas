<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDAMPLUSterrenoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'DAMPLUSterreno';

    /**
     * Run the migrations.  
     * @table DAMPLUSterreno
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('idc')->nullable();
            $table->string('Identificacionc')->nullable();
            $table->string('AREA')->nullable();
            $table->string('IdAgentec')->nullable();
            $table->date('fecha')->nullable();
            $table->string('fechaVisita')->nullable();
            $table->string('comentario')->nullable();
            $table->string('estado')->nullable();
            $table->string('dato')->nullable();
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->string('dato4')->nullable();
            $table->string('dato5')->nullable();
            $table->string('dato6')->nullable();
            $table->string('dato7')->nullable();
            $table->string('dato8')->nullable();
            $table->string('dato9')->nullable();
            $table->string('dato10')->nullable();
    

        
       
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
