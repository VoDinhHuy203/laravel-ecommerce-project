<?php

use App\Models\Cart;
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
        Schema::table('cart_products', function (Blueprint $table) {
            // Thêm cột 'cart_id' nếu chưa tồn tại
            if (!Schema::hasColumn('cart_products', 'cart_id')) {
                $table->foreignIdFor(Cart::class, 'cart_id')->constrained()->onDelete('cascade');
            }

            // Xóa cột 'user_id' nếu tồn tại
            if (Schema::hasColumn('cart_products', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            // Xóa cột 'product_color' nếu tồn tại
            if (Schema::hasColumn('cart_products', 'product_color')) {
                $table->dropColumn('product_color');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_products', function (Blueprint $table) {
            // Xóa cột 'cart_id' nếu tồn tại
            if (Schema::hasColumn('cart_products', 'cart_id')) {
                $table->dropColumn('cart_id');
            }

            // Thêm lại cột 'user_id' nếu chưa tồn tại
            if (!Schema::hasColumn('cart_products', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
            }

            // Thêm lại cột 'product_color' nếu chưa tồn tại
            if (!Schema::hasColumn('cart_products', 'product_color')) {
                $table->string('product_color')->nullable();
            }
        });
    }
};
