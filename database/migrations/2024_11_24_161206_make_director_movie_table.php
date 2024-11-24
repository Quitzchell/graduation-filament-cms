<?php

use App\Models\Director;
use App\Models\Movie;
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
        Schema::create('director_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Director::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Movie::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_movie');
    }
};
