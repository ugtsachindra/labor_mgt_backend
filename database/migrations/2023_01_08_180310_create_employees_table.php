<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_category_id');
            $table->unsignedInteger('employeement_type_id');
            $table->unsignedInteger('agreement_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('last_name');
            $table->string('initials')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('nic')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
