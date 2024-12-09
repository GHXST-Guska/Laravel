<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarListTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guitar_list', function (Blueprint $table) {
            $table->id('id_guitar'); // Primary key
            $table->string('name'); // Nama gitar
            $table->text('description')->nullable(); // Deskripsi gitar
            $table->string('image_url'); // URL gambar gitar
            $table->string('brand'); // Merek gitar
            $table->decimal('price', 10, 2); // Harga gitar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Batalkan migrasi dengan menghapus tabel.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guitar_list');
    }
}