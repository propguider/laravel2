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
            $table->string('first_name')->length(50);
            $table->string('last_name')->length(50);
            $table->integer('age')->length(11);
            $table->boolean('martial_status')->nullable();
            $table->string('nationality')->length(50)->nullable();
            $table->string('religious')->length(50)->nullable();
            $table->string('blood_group')->length(50)->nullable();
            $table->string('designation')->length(50)->nullale();
            $table->string('qualification')->length(50);
            $table->string('passport_no')->length(50);
            $table->bigInteger('aadhar_no')->unsigned();
            $table->string('pan_no')->length(50);
            $table->string('employee_id')->length(50);
            $table->string('name_of_bank')->length(50);
            $table->bigInteger('salary_account_no')->unsigned();
            $table->string('ifsc_code')->length(50);
            $table->string('email')->length(50);
            $table->string('employee_status')->length(50)->default('Blocked');
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('last_working_date')->nullable();
            $table->string('employee_image')->nullable();
            $table->string('employee_document')->nullable();
            $table->boolean('status')->length(50)->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
