<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->foreignUuid('payer_wallet_id')->constrained('wallets', 'id');
            $table->foreignUuid('payee_wallet_id')->constrained('wallets', 'id');
            $table->bigInteger('amount');
            $table->foreignId('status_id')->constrained('generic_status');
            $table->foreignId('type_id')->constrained('transaction_types');
            $table->foreignUuid('refound_transaction_id')->constrained('transactions');
            $table->string('refound_reason');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
