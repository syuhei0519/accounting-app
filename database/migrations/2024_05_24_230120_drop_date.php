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
        Schema::table('income_categories', function (Blueprint $table) {
            $table->dropColumn('date');
        });
        Schema::table('spend_categories', function (Blueprint $table) {
            $table->dropColumn('date');
        });
        Schema::table('payment_ways', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('income_categories', function (Blueprint $table) {
            $table->date('date');
        });
        Schema::table('spend_categories', function (Blueprint $table) {
            $table->date('date');
        });
        Schema::table('payment_ways', function (Blueprint $table) {
            $table->date('date');
        });
    }
};
