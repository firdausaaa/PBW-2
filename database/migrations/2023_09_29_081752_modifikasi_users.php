<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // AHMAD FAZA AL FARISI (6706220050)
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Penambahan kolom
            $table->string('username', 100);
            $table->string('address', 1000);
            $table->string('phoneNumber', 20);
            $table->date('birthdate')->nullable();

            // Modifikasi kolom
            $table->renameColumn('name', 'fullName');
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
