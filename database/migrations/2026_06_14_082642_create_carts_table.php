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
    {Schema::create('carts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

    $table->integer('total_items')->default(0);

    $table->decimal('tax_amount', 10, 2)->default(0);
    $table->decimal('shipping_fee', 10, 2)->default(0);
    $table->decimal('grand_total', 10, 2)->default(0);

    $table->string('coupon_code')->nullable();

    $table->enum('status', ['active','converted','abandoned'])->default('active');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
