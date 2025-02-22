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
              // Add the role_id column
        $table->unsignedBigInteger('role_id')->nullable();

        // If you want to add a foreign key constraint
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
              // Drop the role_id column and its foreign key constraint
        $table->dropForeign(['role_id']);
        $table->dropColumn('role_id');
        });
    }
};
