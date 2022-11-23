<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaOngkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('harga_ongkir');
            $table->bigInteger('id_kurir')->unsigned();
            $table->foreign('id_kurir')->reference('id')->on('ekspeditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('harga_ongkir');
            $table->dropColumn('id_kurir')->unsigned();
            $table->dropForeign('id_kurir')->reference('id')->on('ekspeditions')->onDelete('cascade');
        });
    }
}
