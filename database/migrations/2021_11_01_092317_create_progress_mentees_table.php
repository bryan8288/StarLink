<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressMenteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_mentees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mentee_id');
            $table->foreign('mentee_id')->references('id')->on('mentees')->onDelete('cascade');
            $table->unsignedInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('progress_mentees');
    }
}
