<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDAMPLUSDependentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'DAMPLUSdependents';

    /**
     * Run the migrations.
     * @table DAMPLUSdependents
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tipo_documento')->nullable(); 
            $table->string('cedula', 255)->nullable();
            $table->string('sexo', 10)->nullable();
            $table->string('apellidos',255)->nullable();
            $table->string('nombres', 100)->nullable();
            $table->string('estadocivil')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('direccioncasa', 255)->nullable();
            $table->string('celular', 45)->nullable();
            $table->string('celular2', 45)->nullable();
            $table->string('celular3', 100)->nullable();
            $table->string('celular4', 100)->nullable();
            $table->string('celular5', 100)->nullable();
            $table->string('telefonocasa', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('convencional', 100)->nullable();
            $table->string('convencional2', 100)->nullable();
            $table->string('telefonoparentesco', 100)->nullable();
            $table->string('telefonoparentesco2', 100)->nullable();  
            $table->string('telefonoparentesco3', 100)->nullable();  
            $table->string('telefonoparentesco4', 100)->nullable();  
            $table->string('telefonoparentesco5', 100)->nullable();  
            $table->string('telefonoparentesco6', 100)->nullable();  
            $table->string('telefonoparentesco7', 100)->nullable();    
            $table->string('parentesco', 100)->nullable();
            $table->string('parentesco2', 100)->nullable();
            $table->string('parentesco3', 100)->nullable();
            $table->string('parentesco4', 100)->nullable();
            $table->string('parentesco5', 100)->nullable();
            $table->string('parentesco6', 100)->nullable();
            $table->string('parentesco7', 100)->nullable();
            $table->string('nombreempresa', 255)->nullable();
            $table->string('antiguedad', 45)->nullable();
            $table->string('departamento', 200)->nullable();
            $table->string('condicionlaboral', 255)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->decimal('salario')->nullable();
            $table->string('direccionempresa', 255)->nullable();
            $table->string('rucempresa', 255)->nullable();
            $table->string('codicoprovincia', 45)->nullable();
            $table->string('telefonotrabajo', 100)->nullable();
            $table->string('extesion', 45)->nullable();
            $table->string('girosempresa', 45)->nullable();
            $table->string('tipo_empleado', 45)->nullable();
            $table->string('provincia',255)->nullable(); 
            $table->string('canton',255)->nullable();
            $table->string('parroquia',255)->nullable(); 
            $table->string('region',255)->nullable();
            $table->string('observacion')->nullable();
            $table->string('dato')->nullable();
            $table->string('dato1')->nullable();
            $table->string('dato3')->nullable();
            $table->string('dato4')->nullable();
            $table->string('dato5')->nullable();
            $table->string('dato6')->nullable();
            $table->string('dato7')->nullable();
            $table->string('dato8')->nullable();
            $table->string('dato9')->nullable();
            $table->string('data10')->nullable();
            $table->integer('dato11')->nullable();
            $table->integer('dato12')->nullable();
            $table->integer('dato13')->nullable();
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
