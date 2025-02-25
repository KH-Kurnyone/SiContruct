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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // bigint, relasi ke users
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // bigint, relasi ke projects
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // bigint, relasi ke companies
            $table->enum('position', ['Mandor', 'Tukang', 'Helper', 'Teknisi']); // enum posisi pekerja
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
