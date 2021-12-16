<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAnulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_anulations', function (Blueprint $table) {
            $table->id();
            $table->string('number_ticket')->nullable();
            $table->date('date_anulation')->nullable();
            $table->time('hour')->nullable();
            $table->string('patient')->nullable();
            $table->string('name_doctor')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('response_anulation')->nullable();
            $table->date('date_load')->nullable();
            $table->date('date_close')->nullable();
            $table->string('tiphication')->nullable();
            $table->string('executive')->nullable();
            $table->date('date_gestion')->nullable();
            $table->string('trys')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_anulations');
    }
}
