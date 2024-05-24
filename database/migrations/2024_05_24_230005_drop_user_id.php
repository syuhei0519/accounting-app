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
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropForeign('incomes_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('spends', function (Blueprint $table) {
            $table->dropForeign('spends_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('income_categories', function (Blueprint $table) {
            $table->dropForeign('income_categories_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('spend_categories', function (Blueprint $table) {
            $table->dropForeign('spend_categories_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('payment_ways', function (Blueprint $table) {
            $table->dropForeign('payment_ways_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('spends', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('income_categories', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('spend_categories', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('payment_ways', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
