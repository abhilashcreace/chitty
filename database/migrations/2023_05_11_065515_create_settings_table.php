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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('default_password')->nullable();
            $table->string('email')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('copyright_content')->nullable();
            $table->string('logo')->nullable();
            $table->string('default_image')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();

            $table->bigInteger('status')
                ->unsigned()->default(1)->comment('0-inactive, 1-active, 2-deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
