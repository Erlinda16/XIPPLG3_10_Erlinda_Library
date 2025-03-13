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
        Schema::create(table: 'user1s', callback: function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'username')->unique();
            $table->string(column: 'password');
            $table->string(column: 'name');
            $table->string(column: 'email')->unique();
            $table->string(column: 'phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user1s');
    }
};
