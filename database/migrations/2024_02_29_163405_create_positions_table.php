<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Uuid::uuid4());
            $table->string('position_title')->nullable();
            // $table->uuid('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->uuid('grade_id')->nullable();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
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
        Schema::dropIfExists('positions');
    }
}
