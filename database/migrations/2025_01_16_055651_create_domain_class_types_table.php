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
        Schema::create('domain_class_types', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->integer('sequence_number');
            $table->boolean('status')->default(true);

            // Foreign key fields as simple unsignedBigInteger
            $table->unsignedBigInteger('domain_class_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('color')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_class_types');
    }
};
