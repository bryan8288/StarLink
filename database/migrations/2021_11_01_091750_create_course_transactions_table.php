<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedInteger('mentee_id');
            $table->foreign('mentee_id')->references('id')->on('mentees')->onDelete('cascade');
            $table->string('status');
            $table->longText('mentor_feedback');
            $table->date('graduated_date');
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
        Schema::dropIfExists('course_details');
    }
}
