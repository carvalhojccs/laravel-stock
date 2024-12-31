<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignIdFor(User::class)->comment('Foreign key to the users table');
            $table->string('mother_name')->nullable()->comment('Patient mother name');
            $table->string('father_name')->nullable()->comment('Patiente father name');
            $table->string('registration')->comment('Registration number for the patient');
            $table->string('social_name')->nullable()->comment('Social name for de patient');
            $table->date('birth_date')->comment('Bitrh date for de patient');
            $table->string('rg')->nullable()->comment('General registry number for the patient');
            $table->string('cns')->nullable()->comment('SUS national card number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
