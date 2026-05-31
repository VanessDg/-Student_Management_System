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
            $table->string('gender')->nullable()->after('age');
            $table->string('owner_name')->nullable()->after('address');
            $table->string('owner_job')->nullable()->after('owner_name');
            $table->string('income')->nullable()->after('owner_job');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['gender', 'owner_name', 'owner_job', 'income']);
        });
    }
};
