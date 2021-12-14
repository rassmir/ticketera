<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requeriments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->dateTime('datetime_local');
            $table->string('state');
            $table->string('rut');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('fije1');
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('center_medical_id');
            $table->foreign('center_medical_id')->references('id')->on('center_medicals')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('professional_id');
            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('especiality_id');
            $table->foreign('especiality_id')->references('id')->on('especialities')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->date('date_he')->nullable();
            $table->date('date_response')->nullable();
            $table->string('email');
            $table->longText('observation')->nullable();
            $table->longText('response_medic')->nullable();
            $table->longText('resumen')->nullable();
            $table->dateTime('date_solution')->nullable();
            $table->string('user_create');
            $table->date('date_close')->nullable();
            $table->string('user_close')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requeriments');
    }
}
