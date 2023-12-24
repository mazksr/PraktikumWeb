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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('posisi');
            $table->string('lokasi');
            $table->enum('tipe_pekerjaan', ['full-time', 'part-time', 'other']);
            $table->string('email');
            $table->string('nomor_telp');
            $table->text('job_desc');
            $table->unsignedBigInteger('gaji');
            $table->unsignedBigInteger('userId')->nullable();
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
