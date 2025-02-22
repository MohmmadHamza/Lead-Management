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
        Schema::table('students', function (Blueprint $table) {
            $table->string('parents_mobile')->nullable()->after('followup_status');
            $table->string('qualification')->nullable()->after('parents_mobile');
            $table->string('college')->nullable()->after('qualification');
            $table->text('student_profile')->nullable()->after('college');
            $table->string('resume')->nullable()->after('student_profile');
            $table->date('admission_date')->nullable()->after('resume');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['parents_mobile', 'qualification', 'college', 'student_profile', 'resume', 'admission_date']);
        });
    }
};
