<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittedExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->unsignedInteger('mentee_id');
            $table->foreign('mentee_id')->references('id')->on('mentees')->onDelete('cascade');
            $table->string('file')->nullable();
            $table->boolean('is_finalized');
            $table->integer('score')->nullable();
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
        Schema::dropIfExists('submitted_exams');
    }
}
