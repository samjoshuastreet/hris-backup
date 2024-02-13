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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('first_name', 255);
            $table->string('middle_name', 255);
            $table->string('last_name', 255);
            $table->string('gender', 25);
            $table->string('contact_number', 20);
            $table->string('email_address', 255);
            $table->date('date_of_birth', 20);
            $table->string('status', 20);
            $table->string('permanent_address', 255);
            $table->string('current_address', 255);
            // $table->string('title', 20);
            // $table->string('date_hired', 20);
            // $table->string('salary', 20);
            // $table->string('employment_type', 20);
            $table->string('employee_photo', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
