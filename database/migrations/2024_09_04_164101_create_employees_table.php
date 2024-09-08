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
            $table->string('fName');
            $table->string('lName');
            $table->date('DoB');
            $table->string('gender');
            $table->string("profile_pic")->default("https://placehold.co/600x400");
            $table->string("nationality");
            $table->string("phone_number");
            $table->string("address");
            $table->string("email")->unique();
            $table->string("job_title");
            $table->date('joining_date');
            $table->string("Department");
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
