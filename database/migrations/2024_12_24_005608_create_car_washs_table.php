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
        Schema::create('car_washs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nopol');
            $table->string('car_colour');
            $table->integer('price');
            $table->enum('status', ['Selesai', 'Belum Selesai', 'Menunggu Pembayaran']);
            $table->foreignUuid('customer_id');
            $table->unsignedBigInteger('created_by', false);

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_washs');
    }
};
