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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('invoiceable_id')->nullable();
            $table->string('invoiceable_type')->nullable();
            $table->enum('invoice_type',  ['ad', 'subscription', 'other'])->default('ad');
            $table->decimal('total', 8, 2);
            $table->decimal('discount_total', 8, 2)->default(0);
            $table->decimal('tax_rate', 2, 2)->default(0);
            $table->string('currency')->default('EUR');
            $table->boolean('paid')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->integer('pay_until_days')->default(14);
            $table->json('items');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
