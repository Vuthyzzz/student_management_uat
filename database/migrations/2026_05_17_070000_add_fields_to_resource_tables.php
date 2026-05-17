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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->string('student_name')->nullable();
            $table->string('subject')->nullable();
            $table->string('score')->nullable();
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->string('student_name')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'subject']);
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['name', 'code', 'description']);
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->dropColumn(['student_name', 'subject', 'score']);
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['student_name', 'date', 'status']);
        });
    }
};
