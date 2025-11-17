<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->string('time_harvest');
            $table->decimal('weight_harvest', 8, 2);
            $table->timestamps();
            $table->foreignId('plant_id')->constrained('plants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};
