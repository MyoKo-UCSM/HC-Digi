<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateEmployeeSubDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_sub_departments', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4());
            $table->uuid('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('sub_department_id')->nullable();
            $table->foreign('sub_department_id')->references('id')->on('sub_departments')->onUpdate('cascade');            
            $table->timestamps();
            $table->softDeletes();
            // $table->unique(['employee_id', 'sub_department_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_sub_departments');
    }
}
