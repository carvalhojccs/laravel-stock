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
        Schema::create('pharmaceuticals', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignIdFor(User::class)->comment('Foreign key referencing the user who created the pharmaceutical');
            $table->string('crf')->unique()->comment('Registration number with the regional pharmacy council');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmaceuticals');
    }
};
