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
    Schema::table('items', function (Blueprint $table) {
        $table->decimal('unit_price', 8, 2)->after('quantity');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('unit_price');
    });
}

};

