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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('orderId');
           $table->unsignedBigInteger('prodId');
           $table->bigInteger('quantity');
            $table->decimal('priceAtPurchased', 10, 2);
$table->timestamps();

           $table->foreign('orderId')->references('id')->on('orders');
           $table->foreign('prodId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
