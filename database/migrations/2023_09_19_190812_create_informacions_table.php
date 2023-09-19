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
        Schema::create('informacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descripcion', 500);
            $table->string('sobre_mi');
            $table->string('imagen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacions');
    }
};
