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
        Schema::create('zakat_maal', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->default(date('Y-m-d'));
            $table->string('nama_muzaki');
            $table->text('alamat')->nullable();
            $table->string('jenis_harta')->nullable();
            $table->bigInteger('nominal_zakat_maal')->nullable();
            $table->bigInteger('nominal_infaq_shedekah')->nullable();
            $table->bigInteger('total');
            $table->text('keterangan')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakat_maal');
    }
};
