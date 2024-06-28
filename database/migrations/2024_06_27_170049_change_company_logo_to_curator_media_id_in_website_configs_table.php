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
        Schema::table('website_configs', function (Blueprint $table) {
            // Rename the column
            $table->renameColumn('company_logo', 'company_logo_id');
        });

        Schema::table('website_configs', function (Blueprint $table) {
            // Change the column type
            $table->unsignedBigInteger('company_logo_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_configs', function (Blueprint $table) {
            // Revert the column type change
            $table->string('company_logo_id')->nullable()->change();
        });

        Schema::table('website_configs', function (Blueprint $table) {
            // Rename the column back to its original name
            $table->renameColumn('company_logo_id', 'company_logo');
        });
    }
};
