<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('student_fees', function (Blueprint $table) {
            $table->decimal('discounted_fees', 10, 2)->nullable()->after('total_fees'); // Discounted Fee
            $table->enum('payment_type', ['full', 'installment'])->default('installment')->after('remaining_amount'); // Payment Type
        });
    }

    public function down()
    {
        Schema::table('student_fees', function (Blueprint $table) {
            $table->dropColumn(['discounted_fees', 'payment_type']);
        });
    }
};

