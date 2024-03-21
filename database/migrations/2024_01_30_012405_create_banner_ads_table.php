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
        Schema::create('banner_ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('category');
            $table->string('position')->nullable();
            $table->string('link');

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
        Schema::dropIfExists('banner_ads');
    }
};
