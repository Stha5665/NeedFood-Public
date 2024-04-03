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
        Schema::create('collaborations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id');
            $table->foreignUuid('collaborator_id');
            $table->foreignUuid('request_id')->nullable();
            $table->foreignUuid('donation_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('under-approval');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('collaborator_id')->references('id')->on('users');
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('donation_id')->references('id')->on('donations');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
