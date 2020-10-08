<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');  
            $table->timestamps();
        });

        Schema::table('submit', function (Blueprint $table) {
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('assignment_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('assignment_id')->references('id')->on('assignment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submit');
    }
}
