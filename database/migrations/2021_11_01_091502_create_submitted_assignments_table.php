<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittedAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assignment_id');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->unsignedInteger('mentee_id');
            $table->foreign('mentee_id')->references('id')->on('mentees')->onDelete('cascade');
            $table->string('file');
            $table->date('uploaded_date');
            $table->integer('score');
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
        Schema::dropIfExists('submitted_assignments');
    }
}
