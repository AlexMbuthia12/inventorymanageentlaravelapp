<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('item_id')->constrained()->onDelete('cascade'); // Links to items
        $table->integer('quantity');
        $table->decimal('total_price', 10, 2);
        $table->timestamp('sold_at');
        $table->timestamps();
    });
}

    // public function up(): void
    // {
    //     Schema::create('sales', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
