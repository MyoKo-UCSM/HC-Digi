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
        Schema::create('blood_groups', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(NEWID())'));
            $table->string('blood_group_name')->nullable();
            $table->string('description')->nullable();
            $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('blood_groups');
    }
};
