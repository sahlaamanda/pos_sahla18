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
    Schema::create('jenis', function (Blueprint $table) {
        $table->id();
        $table->string('nama'); // Ubah dari 'nama_jenis' menjadi 'nama'
        $table->string('deskripsi')->nullable(); // Pastikan kolom deskripsi juga ada
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
    }
};
