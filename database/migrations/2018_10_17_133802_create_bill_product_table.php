<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bill_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_color_id');
            $table->unsignedInteger('product_size_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('bill_product', function (Blueprint $table) {
            $table->dropForeign('bill_product_bill_id_foreign');
            $table->dropForeign('bill_product_product_id_foreign');
            $table->dropForeign('bill_product_product_color_id_foreign');
            $table->dropForeign('bill_product_product_size_id_foreign');
        });
                
        Schema::dropIfExists('bill_product');
    }
}
