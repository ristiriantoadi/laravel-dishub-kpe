<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingColumnsToKendaraans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->string('nouji');
            $table->string('merk');
            $table->string('thpembuatan');
            $table->string('norangka');
            $table->string('dayaangkutorang');
            $table->string('alamatperusahaan');
            $table->string('namapemilik');
            $table->string('nosk');
            $table->date('masaberlaku');
            $table->date('tglawalsk');
            $table->date('tglakhirsk');
            $table->date('tglawalspm');
            $table->date('tglakhirspm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            //
        });
    }
}
