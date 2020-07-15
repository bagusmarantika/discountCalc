<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->integer('id_barang')->unsigned()->change();
            $table->foreign('id_barang')->references('id')->on('barangs')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->dropForeign('pembelians_id_barang_foreign');
        });

        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->dropIndex('pembelians_id_barang_foreign');
        });

        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->integer('id_barang')->change();
        });
    }
}
