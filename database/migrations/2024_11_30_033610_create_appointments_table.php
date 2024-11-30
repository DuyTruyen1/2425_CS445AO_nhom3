<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('meeting_url');

            // Chỉ cần lưu ID của các bảng liên quan
            $table->integer('teacher_id')->nullable();  // Khóa ngoại liên kết tới bảng teacher
            $table->integer('company_id')->nullable();  // Khóa ngoại liên kết tới bảng company
            $table->integer('student_id')->nullable();  // Khóa ngoại liên kết tới bảng students

            // Thêm các khóa ngoại tương ứng
            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('set null');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
