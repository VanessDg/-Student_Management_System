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
        Schema::table('students', function (Blueprint $table) {
            $table->string('roll')->nullable()->after('name');
            $table->string('address')->nullable()->after('email');
            $table->string('class')->nullable()->after('age');
            $table->date('date_of_birth')->nullable()->after('age');
            $table->string('phone')->nullable()->after('age');
            $table->string('profile_picture')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['roll', 'address', 'class', 'date_of_birth', 'phone', 'profile_picture']);
        });
    }
};
