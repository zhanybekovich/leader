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
        Schema::create('website_configs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_slogan')
                ->nullable();
            $table->text('company_description')
                ->nullable();
            $table->string('company_address')
                ->nullable();
            $table->string('company_phone')
                ->nullable();
            $table->string('company_email')
                ->nullable();
            $table->string('company_logo')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_configs');
    }
};
