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
        Schema::create('modules', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Module name
            $table->text('description')->nullable(); // Module description
            $table->decimal('price_per_user', 10, 2); // Price per user
            $table->timestamps(); // created_at and updated_at columns
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
