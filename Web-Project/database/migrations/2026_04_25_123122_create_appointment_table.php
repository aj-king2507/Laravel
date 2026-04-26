<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id('appointment_id');

            // Foreign keys (match your system design)
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('therapist_id');
            $table->unsignedBigInteger('service_id');

            $table->foreign('customer_id')->references('customer_id')->on('Customer')->onDelete('cascade');
            $table->foreign('therapist_id')->references('therapist_id')->on('Therapist')->onDelete('cascade');
            $table->foreign('service_id')->references('service_id')->on('Service')->onDelete('cascade');

            // Booking timing
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');

            // Status tracking
            $table->enum('status', ['Booked', 'Cancelled', 'Completed'])->default('Booked');

            // Notes + admin tracking
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('changed_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
