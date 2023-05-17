<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('Tên');
                $table->string('email')->unique()->comment('Email');
                $table->string('password')->comment('Mật khẩu');
                $table->enum('gender', ['male', 'female', 'unspecified'])->default('unspecified')->comment('Giới tính');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
