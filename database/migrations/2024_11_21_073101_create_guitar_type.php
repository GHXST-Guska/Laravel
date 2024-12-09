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
        Schema::create('guitar_types', function (Blueprint $table) {
            $table->id('id_type'); // Primary key
            $table->string('type_name'); // Nama tipe gitar
            $table->text('description')->nullable(); // Deskripsi tipe gitar
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guitar_type');
    }
};
