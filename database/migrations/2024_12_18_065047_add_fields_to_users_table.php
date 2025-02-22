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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status',['0','1'])->default('1'); // Status field
            $table->unsignedBigInteger('role'); // Role field
            $table->string('mobile')->nullable(); // Mobile field
            $table->date('dob')->nullable(); // Date of Birth field
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender field
            $table->string('address')->nullable(); // Address field
            $table->string('landmark')->nullable(); // Landmark field
            $table->string('pin_code')->nullable(); // Pin Code field
            $table->unsignedBigInteger('state'); // State field
            $table->unsignedBigInteger('city'); // City field
            $table->string('photo')->nullable(); // Photo field
    
            // Foreign key constraints (if needed)
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('role');
            $table->dropColumn('mobile');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('landmark');
            $table->dropColumn('pin_code');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('photo');
        });
    }
};
