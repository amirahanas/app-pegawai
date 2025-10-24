<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Hapus tabel lama jika ada
        Schema::dropIfExists('attendance');
        
        // Buat tabel baru dengan struktur yang lengkap
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->enum('status', ['hadir', 'izin', 'sakit', 'cuti', 'alpha']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            // Prevent duplicate entries for same employee on same date
            $table->unique(['employee_id', 'tanggal']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};