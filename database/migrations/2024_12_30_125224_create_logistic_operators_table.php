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
        Schema::create('logistic_operators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('rg')->unique()->comment('Número de registro do operador logístico');
            $table->date('birth_date')->comment('Data de nascimento do operador logístico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistic_operators');
    }
};
