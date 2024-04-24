<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sub_departments', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4());
            $table->string('sub_department_name')->nullable();
            $table->uuid('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('sort_order')->nullable();
            $table->text('description')->nullable();
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
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_departments');
    }
};
