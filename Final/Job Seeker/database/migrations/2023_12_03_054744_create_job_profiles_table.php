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
        Schema::create('job_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobId');
            $table->unsignedBigInteger('profileId');
            $table->string('nama');
            $table->string('CV');
            $table->enum('status', ['accepted', 'rejected', 'waiting']);
            $table->timestamps();

            $table->foreign('jobId')->references('id')->on('jobs');
            $table->foreign('profileId')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_profile');
    }
};
