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
            $table->morphs('sourceable'); // Khách hàng hay vendor đặt
            $table->integer('product_id');
            $table->string('address');
            $table->integer(
                'vendor_id'
            ); // Khi order Vô thì sẽ lấy vendor append luôn vô để tính được vendor đặt hàng nhiều nhất trong vòng 1 tuần.
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
