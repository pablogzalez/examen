<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('first_name');
            $table->string('last_name');
            $table->uuid('nif');
            $table->string('adress');
            $table->string('postcode');
            $table->timestamps();
        }); //he borrado las columnas fecha_alta (la obtengo del created_at), validate y repeating (ya que ahora no las obtendre de esta tabla, sino de la correspondiente).
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
