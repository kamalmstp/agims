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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('site_id')->constrained('sites')->onDelete('cascade');
            $table->foreignId('model_id')->constrained('unit_models')->onDelete('cascade');
            $table->string('unit_code', 10);
            $table->string('model_number', 50)->nullable();
            $table->string('chassis_number', 50)->nullable();
            $table->integer('raw')->nullable();
            $table->integer('faw')->nullable();
            $table->integer('gcw')->nullable();
            $table->string('engine_model', 50)->nullable();
            $table->string('engine_number', 50)->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('made_year')->nullable();
            $table->decimal('hm_current', 10, 2)->nullable();
            $table->decimal('km_current', 10, 2)->nullable();
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
