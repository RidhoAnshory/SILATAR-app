<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('Jenis_laporan', 50)->after('id_user');
            $table->string('Keterangan')->nullable()->after('Unggah_Foto');
            $table->string('Status', 50)->after('Unggah_Foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropcolumn('Jenis_laporan');
            $table->dropcolumn('Keterangan');
            $table->dropcolumn('Status');
        });
    }
}
