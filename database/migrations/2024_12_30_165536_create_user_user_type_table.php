<?php

use App\Models\User;
use App\Models\UserType;
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
        Schema::create('user_user_type', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignIdFor(User::class)->comment('Foreign key to users table');
            $table->foreignIdFor(UserType::class)->comment('Foreign key to user_types table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_user_type');
    }
};
