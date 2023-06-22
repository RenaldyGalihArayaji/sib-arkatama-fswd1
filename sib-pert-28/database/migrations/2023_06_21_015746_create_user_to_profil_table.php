<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp')->nullable()->after('role_id');
            $table->string('alamat')->nullable()->after('role_id');
            $table->string('image')->nullable()->after('role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'no_hp')) {
                $table->dropColumn('no_hp');
            };
        });
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'alamat')) {
                $table->dropColumn('alamat');
            };
        });
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'image')) {
                $table->dropColumn('image');
            };
        });
    }
};
