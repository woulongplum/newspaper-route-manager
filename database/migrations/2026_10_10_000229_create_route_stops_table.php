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
        Schema::create('route_stops', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('route_id')->constrained()->cascadeOnDelete();
            $table->foreignUlid('customer_id')->constrained();
            $table->string('edition')->comment('順路のeditionと同じ値');
            $table->unsignedInteger('position')->comment('順路内の配達順');
            $table->timestamps();

            $table->index(['route_id', 'position']);
            $table->unique(['customer_id', 'edition']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_stops');
    }
};
