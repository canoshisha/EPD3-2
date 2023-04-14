<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_baskets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_basket_id')->constrained('shopping_baskets')->nullable()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products');
            $table->integer('cantidad');
            $table->string('size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_baskets');
    }
};
