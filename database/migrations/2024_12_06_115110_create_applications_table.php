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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('research_topic_id');
            $table->Integer('student_id');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Trạng thái ứng tuyển
            $table->timestamps();

            $table->foreign('research_topic_id')->references('id')->on('research_topics')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
