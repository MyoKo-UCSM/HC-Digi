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
    public function up(): void
    {
        Schema::create('nrcs', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4());
            $table->string('nrc_code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_mm')->nullable();
            $table->string('nrc_type')->nullable();
            $table->string('nrc_number')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->datetime('created_date')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('nrcs');
    }
};
