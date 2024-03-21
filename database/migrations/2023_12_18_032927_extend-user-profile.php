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
            //
            $table->string('phone')->after('email_verified_at')->nullable();
            $table->string('phone_country_code')->after('phone')->nullable();
            $table->string('company_name')->after('phone_country_code')->nullable();
            $table->string('country')->after('company_name')->nullable();
            $table->string('province')->after('country')->nullable();
            $table->string('town')->after('province')->nullable();
            $table->string('zip_code')->after('town')->nullable();
            $table->string('street_address')->after('zip_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('phone_country_code');
            $table->dropColumn('company_name');
            $table->dropColumn('country');
            $table->dropColumn('province');
            $table->dropColumn('town');
            $table->dropColumn('zip_code');
            $table->dropColumn('street_address');
        });
    }
};
