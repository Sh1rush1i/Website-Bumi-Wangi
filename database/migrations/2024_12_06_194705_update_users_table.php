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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->change();
            $table->string('name')->nullable()->after('username');
            $table->string('email')->nullable()->after('name');
            $table->string('phoneNumber')->nullable()->after('email');
            $table->string('role')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(false)->change();
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phoneNumber');
            $table->dropColumn('role');
        });
    }
};
