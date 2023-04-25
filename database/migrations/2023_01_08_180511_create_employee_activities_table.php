<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_activities', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('agreement_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('activity_project_id');
            $table->dateTime('time_start',0)->nullable();
            $table->dateTime('time_end',0)->nullable();
            $table->integer('effective_hours')->nullable();
            $table->integer('approved_hours')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('employee_activities');
    }
}
