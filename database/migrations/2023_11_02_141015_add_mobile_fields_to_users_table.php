<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('mobile_verify_code')->nullable();
            $table->tinyInteger('mobile_attempts_left')->default(0);
            $table->timestamp('mobile_last_attempt_date')->nullable();
            $table->timestamp('mobile_verify_code_sent_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'mobile_number',
                'mobile_verified_at',
                'mobile_verify_code',
                'mobile_attempts_left',
                'mobile_last_attempt_date',
                'mobile_verify_code_sent_at'
            ]);
        });
    }
};
