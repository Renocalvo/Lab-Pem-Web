<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychologistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('psychologists', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('name'); // Name of the psychologist
            $table->string('specialization'); // Specialization of the psychologist
            $table->text('bio'); // Biography of the psychologist
            $table->string('contact'); // Contact information
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('psychologists');
    }
}

