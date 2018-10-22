<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shop', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('product_color_id');
            $table->unsignedInteger('product_size_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_color_id')->references('id')->on('product_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_size_id')->references('id')->on('product_sizes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_shop', function (Blueprint $table) {
            $table->dropForeign('product_shop_product_id_foreign');
            $table->dropForeign('product_shop_shop_id_foreign');
            $table->dropForeign('product_shop_product_color_id_foreign');
            $table->dropForeign('product_shop_product_size_id_foreign');
        });

        Schema::dropIfExists('product_shop');
    }
}
