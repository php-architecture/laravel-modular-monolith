<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('availability_hours', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('doctor_uuid');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('cost');
            $table->decimal('is_reserved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability_hours');
    }
};
