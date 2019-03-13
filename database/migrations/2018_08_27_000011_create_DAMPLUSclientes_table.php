<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDAMPLUSClientesTable extends Migration
{
    public $timestamps = false;

    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'DAMPLUSclientes';

    /**
     * Run the migrations.
     * @table DAMPLUSclientes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tipo_documento')->nullable(); 
            $table->string('cedula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('direccion')->nullable();
            $table->string('provincia')->nullable(); 
            $table->string('canton')->nullable();
            $table->string('parroquia')->nullable(); 
            $table->string('region')->nullable();
            $table->string('provincia_id')->nullable();
            $table->string('canton_id')->nullable();
            $table->string('parroquia_id')->nullable();
            $table->string('region_id')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('sexo')->nullable();
            $table->string('discapacidad_id')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('celular')->nullable();
            $table->string('celular2')->nullable();
            $table->string('celular3')->nullable();
            $table->string('celular4')->nullable();
            $table->string('convencional')->nullable();
            $table->string('convencional2')->nullable();
            $table->string('convencional3')->nullable();
            $table->string('telefonotrabajo')->nullable();
            $table->string('telefonotrabajo2')->nullable();
            $table->string('extension')->nullable();
            $table->string('direccion_trabajo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('email')->nullable();
            $table->string('telefonoparentesco')->nullable();  
            $table->string('parentesco')->nullable();  
            $table->string('observacion')->nullable();  
            $table->string('tipo_empleado_id')->nullable();
   
            $table->string('tipo_empleado')->nullable();

            $table->string('cargo')->nullable();
            $table->string('salario')->nullable();
            $table->string('antiguedad')->nullable();
            $table->string('familiar_id')->nullable();
            $table->string('dato')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->string('dato4')->nullable();
            $table->string('dato5')->nullable();
            $table->string('dato6')->nullable();
            $table->string('dato7')->nullable();
            $table->string('dato8')->nullable();
            $table->string('dato9')->nullable();
            $table->string('dato10')->nullable();
            $table->string('dato11')->nullable();
            $table->string('dato12')->nullable();


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
