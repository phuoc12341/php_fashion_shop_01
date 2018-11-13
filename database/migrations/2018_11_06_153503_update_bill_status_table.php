<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBillStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_status', function (Blueprint $table) {
            $table->dropColumn('status_name');
            $table->unsignedInteger('status_id')->default(1)->after('user_id');
        });

        $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_status', function (Blueprint $table) {
            $table->string('status_name', 50)->after('user_id');
            $table->dropColumn('status_id');
            $table->dropForeign('bill_status_status_id_foreign');
        });
    }
}
