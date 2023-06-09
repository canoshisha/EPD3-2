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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('pagement');
            $table-> date('date');
            $table->string('state');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('addresses_id')->constrained()->onDelete('cascade');
            $table->foreignId('credit_cards_id')->constrained()->onDelete('cascade');


            // $table->foreignId('products_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};