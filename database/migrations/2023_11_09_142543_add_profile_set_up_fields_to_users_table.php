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
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('upload_profile_photo')->nullable();
            $table->timestamp('set_avatar')->nullable();
            $table->timestamp('set_about')->nullable();
            $table->boolean('has_set_up_profile')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'upload_profile_photo',
                'set_avatar',
                'set_about',
                'has_set_up_profile',
            ]);
        });
    }
};
