<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel partners baru.
     */
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_url');
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel partners.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
