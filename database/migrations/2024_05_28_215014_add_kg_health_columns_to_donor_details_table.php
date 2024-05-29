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
        Schema::table('donor_details', function (Blueprint $table) {
            $table->float('kg')->nullable();
            $table->text('health')->nullable();
            $table->integer('times')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donor_details', function (Blueprint $table) {
            $table->dropColumn('kg');
            $table->dropColumn('health');
            $table->dropColumn('times');
        });
    }
};
