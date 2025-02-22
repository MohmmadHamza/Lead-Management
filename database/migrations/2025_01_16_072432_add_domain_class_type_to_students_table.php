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
            $table->unsignedBigInteger('domain_class_type')->nullable()->after('domain'); // Add the column after 'domain'
            $table->foreign('domain_class_type')->references('id')->on('domain_class_types')->onDelete('cascade'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['domain_class_type']); // Drop the foreign key
            $table->dropColumn('domain_class_type'); // Drop the column
        });
    }
};
