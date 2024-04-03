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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('quantity');
            $table->text('description');
            $table->string('unit');
            $table->enum('type', ['requested', 'donated']);
            //            remaining quantity to be fulfilled
            $table->integer('remaining_quantity')->nullable();
            $table->string('status');
            $table->enum('is_expiry_date_needed', ['yes', 'no'])->nullable();
            $table->date('expiry_date')->nullable();

            $table->foreignUuid('request_id')->nullable();
            $table->foreignUuid('donation_id')->nullable();


//            $table->foreign('request_id')->references('id')->on('requests');
//            $table->foreign('donation_id')->references('id')->on('donations');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
