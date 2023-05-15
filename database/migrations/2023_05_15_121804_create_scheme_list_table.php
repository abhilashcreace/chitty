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
        Schema::create('scheme_list', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('scheme_id')->unsigned()->nullable();
            $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('month')->nullable();
            $table->string('subs');
            $table->string('cum');
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
        Schema::dropIfExists('scheme_list');
    }
};
