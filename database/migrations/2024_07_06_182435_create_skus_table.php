<?php

use App\Models\Shop\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnUpdate();
            $table->string('name');
            $table->string('code');
            $table->bigInteger('price')->default(0);
            $table->bigInteger('discount')->nullable();
            $table->text('image')->nullable();
            $table->integer('marketable')->default(1);
            $table->boolean('in_stock')->default(true);
            $table->tinyInteger('sales_status')->comment('0: available, 1: unavailable, 2: coming-soon, 3: call')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
