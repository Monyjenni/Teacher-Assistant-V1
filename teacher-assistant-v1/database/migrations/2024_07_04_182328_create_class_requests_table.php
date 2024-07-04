<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('class_requests', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_requests');
    }
};
