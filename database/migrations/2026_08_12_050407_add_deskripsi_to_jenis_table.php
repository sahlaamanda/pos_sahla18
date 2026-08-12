<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jenis', function (Blueprint $table) {
            $table->string('deskripsi')->nullable()->after('nama_jenis');
        });
    }

    public function down(): void
    {
        Schema::table('jenis', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};