<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4());
            $table->string('employee_id')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('name')->nullable();
            $table->uuid('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');     
            $table->uuid('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->uuid('grade_id')->nullable();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('no action');
            $table->uuid('blood_group_id')->nullable();
            $table->foreign('blood_group_id')->references('id')->on('blood_groups')->onDelete('cascade');
            $table->string('email')->unique()->nullable();
            $table->string('contact_number')->nullable();
            $table->string('nrc_code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_mm')->nullable();
            $table->string('nrc_type')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('nrc')->nullable();
            $table->string('address')->nullable();
            $table->string('employee_photo')->nullable();
            $table->string('nrc_copy')->nullable();
            $table->string('labor_copy')->nullable();
            $table->string('family_registration_copy')->nullable();
            $table->string('certificate_copy')->nullable();
            $table->string('driving_license_copy')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->datetime('created_date')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
};