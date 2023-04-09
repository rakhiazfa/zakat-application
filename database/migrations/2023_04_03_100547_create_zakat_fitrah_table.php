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
        Schema::create('zakat_fitrah', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->default(date('Y-m-d'));
            $table->string('nama_muzaki');
            $table->text('alamat')->nullable();
            $table->integer('jumlah_jiwa');
            $table->string('jenis_barang')->nullable();
            $table->double('jumlah_beras')->nullable();
            $table->bigInteger('nominal_zakat_fitrah')->nullable();
            $table->bigInteger('nominal_fidyah')->nullable();
            $table->bigInteger('total_uang')->nullable();
            $table->double('total_beras')->nullable();
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
        Schema::dropIfExists('zakat_fitrah');
    }
};
