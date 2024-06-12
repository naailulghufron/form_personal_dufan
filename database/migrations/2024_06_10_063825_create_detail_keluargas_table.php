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
        Schema::create('detail_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id');
            $table->enum('relation', ['Pasangan', 'Anak 1', 'Anak 2', 'Anak 3']);
            $table->string('fullname');
            $table->string('no_dufan_card');
            $table->text('file_dufan_card');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_keluargas');
    }
};
