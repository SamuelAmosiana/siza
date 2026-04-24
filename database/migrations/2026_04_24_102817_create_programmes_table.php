<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('universities')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->enum('level', ['certificate', 'diploma', 'bachelor', 'master', 'doctorate']);
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();
            $table->tinyInteger('duration_years')->default(3);
            $table->decimal('tuition_fee', 10, 2)->nullable();
            $table->string('tuition_currency', 10)->default('ZMW');
            $table->text('description')->nullable();
            $table->text('entry_requirements')->nullable();
            $table->string('study_mode')->default('Full Time'); // Full Time, Part Time, Online
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['university_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};
