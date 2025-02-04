<?php

use App\Models\Shop\Order;
use App\Models\Shop\Sku;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(Sku::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->text('image')->nullable();
            $table->integer('number')->default(1);
            $table->bigInteger('price')->nullable();
            $table->bigInteger('total_price')->nullable()->comment('`number` * `product_price`');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
