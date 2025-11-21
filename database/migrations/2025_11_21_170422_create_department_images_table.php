<?php

use App\Models\Department;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('department_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Department::class)->constrained()->onDelete('cascade');
            $table->string('path');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('department_images');
    }
};
