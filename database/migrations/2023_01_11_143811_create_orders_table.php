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
            $table->foreignId('pizza_id')->nullable()->constrained('pizzas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->nullable()->constrained('buyers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('base');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pizzas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pizza_id');
            $table->dropConstrainedForeignId('buyer_id');
        });
        Schema::dropIfExists('orders');
    }
};
