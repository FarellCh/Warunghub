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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();

            // kasir
            $table->foreignId('account_id')->constrained('accounts');

            // pembeli (boleh null kalau beli tanpa login)
            $table->foreignId('customer_id')->nullable()->constrained('accounts');

            $table->integer('total');
            $table->integer('paid');
            $table->integer('change');

            $table->enum('payment_method', ['cash', 'qris', 'transfer']);
            $table->timestamps();
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
