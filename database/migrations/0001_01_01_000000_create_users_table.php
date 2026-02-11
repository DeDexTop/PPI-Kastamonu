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
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('thumbnail');
            $table->text('deskripsi');
            $table->timestamps();
        });
        Schema::create('activity_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->string('image_path');
            $table->timestamps();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pen_name');
            $table->string('photo'); 
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('thumbnail'); 
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->year('start_period'); 
            $table->year('end_period');   
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });

        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabinet_id')->constrained()->cascadeOnDelete();
            $table->string('name'); // Nama divisi
            $table->timestamps();
    });

        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('level')->default(0);
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabinet_id')->constrained()->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->enum('type', ['core', 'mpa', 'division']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('cabinets');
        Schema::dropIfExists('cabinet_members');
        Schema::dropIfExists('activity_images');
        Schema::dropIfExists('cabinet_images');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('members');
    }
};
