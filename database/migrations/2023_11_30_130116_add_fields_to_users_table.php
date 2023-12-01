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
            $table->string('nick')->nullable()->unique();
            $table->string('locality')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nick');
            $table->dropColumn('locality');
            $table->dropColumn('province');
            $table->dropColumn('country');
            $table->dropColumn('phone');
        });
    }
};
