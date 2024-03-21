<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stable_ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('category');
            $table->string('business_type')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('poa')->nullable();
            $table->json('description')->nullable();
            $table->json('video_link')->nullable();
            $table->json('images')->nullable();
            $table->string('label')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('expired')->default(false);
            $table->integer('views')->default(0);
            $table->timestamp('publish_date')->nullable();
            $table->string('publish_package')->default('Plus');
            $table->json('publish_addons')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stable_ads');
    }
};
