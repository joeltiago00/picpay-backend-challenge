<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->uuid('transaction_refund_id')->nullable()->change();
            $table->string('refund_reason')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->uuid('transaction_refund_id')->change();
            $table->string('refund_reason')->change();
        });
    }
};
