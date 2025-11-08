<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('culture');
            $table->string('fertilizer');
            $table->date('time_fertilizer');
            $table->decimal('weight_fertilizer');        
            $table->timestamps();
            $table->foreign('culture')->references('culture')->on('plants')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('fertilizers');
    }
};
