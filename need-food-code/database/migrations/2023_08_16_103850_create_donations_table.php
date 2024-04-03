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
        Schema::create('donations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('address');
            $table->text('remarks')->nullable();
            $table->text('description');
            $table->integer('quantity')->nullable();
            $table->dateTime('donated_date_time')->nullable();
            $table->string('is_archived')->default('NO')->nullable();
            $table->string('type');
            $table->string('delivery_type');
            $table->string('status');
            $table->string('receiver_id')->nullable();
            $table->date('expiry_date')->nullable();

            $table->foreignUuid('user_id');
            $table->foreignUuid('request_id')->nullable();
            $table->foreignUuid('category_id')->nullable();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
