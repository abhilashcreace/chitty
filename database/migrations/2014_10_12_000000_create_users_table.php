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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('profile_img')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_logout')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('status')
                ->unsigned()->default(1)->comment('0-inactive, 1-active, 2-deleted');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};