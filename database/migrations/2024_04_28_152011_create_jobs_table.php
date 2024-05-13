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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id'); // Foreign key referencing the users table
    $table->string('level')->nullable();;
    $table->string('contact')->nullable();;
    $table->string('email')->nullable();;
    $table->string('website')->nullable();;
    $table->string('name')->nullable();;
    $table->float('price')->default(0);
    $table->string('place')->nullable();;
    $table->text('description')->nullable();;
    $table->string('job_pic')->nullable();
            $table->timestamps();

              // Foreign key constraint
    // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
