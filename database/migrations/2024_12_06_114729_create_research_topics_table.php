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
        Schema::create('research_topics', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề đề tài
            $table->text('description')->nullable(); // Mô tả
            $table->integer('teacher_id'); // Giáo viên tạo đề tài
            $table->decimal('allowance', 10, 2)->nullable(); // Trợ cấp
            $table->date('start_date')->nullable(); // Ngày bắt đầu
            $table->date('end_date')->nullable(); // Ngày kết thúc
            $table->integer('max_students')->default(1); // Số lượng sinh viên tối đa
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_topics');
    }
};
