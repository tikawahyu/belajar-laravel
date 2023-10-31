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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); //kolom id tipedata bigint autoincrement, primary key
            $table->string('judul', 100);
            $table->date('tanggal_terbit');
            $table->integer('jumlah_halaman');
            $table->string('cover');
            $table->timestamps(); //created_at dan updated_at, tipedata timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
