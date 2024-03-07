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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('numberOrder')->comment('Номер заказа');
            $table->text('numberPostavka')->comment('Номер поставщика');
            $table->text('phoneNumber')->comment('Номер телефона');
            $table->text('email')->comment('Почта');
            $table->text('address')->comment('Адрес доставки');
            $table->boolean('delivery')->default('0')->comment('Способ доставки');
            $table->boolean('payment')->default('0')->comment('Способ оплаты');
            $table->boolean('isActive')->default('0')->comment('Статус заказа');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
