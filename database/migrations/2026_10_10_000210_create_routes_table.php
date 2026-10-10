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
        Schema::create('routes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('shop_id')->constrained();
            $table->foreignUlid('area_id')->constrained();
            $table->foreignUlid('carrier_id')->nullable()->constrained()->nullOnDelete();
            $table->string('edition')->comment('morning(朝刊) / evening(夕刊)');
            $table->string('name');
            $table->string('start_name')->nullable();
            $table->decimal('start_lat',10,7)->nullable();
            $table->decimal('start_lng',10,7)->nullable();
            $table->date('last_confirmed_on')->nullable()->comment('最新であると確認した日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
