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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('customer_id')->constrained();
            $table->foreignUlid('newspaper_id')->constrained();
            $table->string('edition')->comment('morning（朝刊） / evening（夕刊）');
            $table->unsignedInteger('quantity')->default(1);
            $table->date('start_date')->comment('入れ（配達開始日）');
            $table->date('end_date')->nullable()->comment('止め（配達終了日）。空なら継続中');
            $table->timestamps();

            $table->index(['customer_id', 'edition']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
