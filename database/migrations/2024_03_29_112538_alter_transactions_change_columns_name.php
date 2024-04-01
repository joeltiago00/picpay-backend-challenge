<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('refound_transaction_id', 'transaction_refund_id');
            $table->renameColumn('refound_reason', 'refund_reason');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('transaction_refund_id', 'refound_transaction_id');
            $table->renameColumn('refund_reason', 'refound_reason');
        });
    }
};
