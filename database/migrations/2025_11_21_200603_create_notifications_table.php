<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->date('sent_at');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
