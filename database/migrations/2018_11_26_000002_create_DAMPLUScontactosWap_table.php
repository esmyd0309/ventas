<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDAMPLUScontactosWapTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'DAMPLUScontactosWap';

    /**
     * Run the migrations.
     * @table DAMPLUScontactosWap
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('numero', 13)->nullable();
            $table->string('cedula', 10)->nullable();
            $table->string('nombres')->nullable();
            $table->string('dato')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
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
