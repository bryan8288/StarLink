<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussmentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_mentors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mentor_id');
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
            $table->longText('description');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('url');
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
        Schema::dropIfExists('discussmentors');
    }
}
