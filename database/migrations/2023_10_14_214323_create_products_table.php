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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');

            $table->integer('retail_price',false,true);
            $table->integer('wholesale_price',false,true);
            $table->integer('box_price',false,true);
            $table->integer('discount',false,true)->nullable();
            $table->integer('purchase_price',false,true);
            $table->integer('stock',)->default(0);
            $table->integer('max_order_limit',false,true);


            $table->decimal('rate',4,2,true)->default(0);
            $table->integer('rate_count',false,true)->default(0);

            $table->timestamps();

            $table->foreignIdFor(\App\Models\Company::class)->constrained();
            $table->foreignIdFor(\App\Models\Category::class)->constrained();
            $table->foreignIdFor(\App\Models\Section::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
