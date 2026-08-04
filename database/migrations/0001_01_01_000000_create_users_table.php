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
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | ACTIVITIES
        |--------------------------------------------------------------------------
        */
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('thumbnail');
            $table->text('deskripsi');
            $table->timestamps();
        });

        Schema::create('activity_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activity_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('image_path');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | AUTHORS
        |--------------------------------------------------------------------------
        */
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pen_name');
            $table->text('bio');
            $table->string('photo');
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | POSTS
        |--------------------------------------------------------------------------
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('thumbnail');
            $table->longText('content');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | CABINETS
        |--------------------------------------------------------------------------
        */
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->year('start_period');

            $table->year('end_period');

            $table->enum('status', ['active', 'inactive'])
                ->default('inactive');

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | CABINET GROUPS
        |--------------------------------------------------------------------------
        */
        Schema::create('cabinet_groups', function (Blueprint $table) {

            $table->id();

            $table->foreignId('cabinet_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('description')
                ->nullable();

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | POSITIONS
        |--------------------------------------------------------------------------
        */
        Schema::create('positions', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->integer('level')
                ->default(0);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | MEMBERS
        |--------------------------------------------------------------------------
        */
        Schema::create('members', function (Blueprint $table) {

            $table->id();

            $table->foreignId('cabinet_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('cabinet_group_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('position_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');

            $table->string('photo')
                ->nullable();

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | BLOGS
        |--------------------------------------------------------------------------
        */
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('thumbnail');

            $table->longText('content');

            $table->timestamps();
        });

        Schema::create('blog_images', function (Blueprint $table) {

            $table->id();

            $table->foreignId('blog_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('image_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_images');
        Schema::dropIfExists('blogs');

        Schema::dropIfExists('members');

        Schema::dropIfExists('positions');

        Schema::dropIfExists('cabinet_groups');

        Schema::dropIfExists('cabinets');

        Schema::dropIfExists('posts');

        Schema::dropIfExists('authors');

        Schema::dropIfExists('activity_images');

        Schema::dropIfExists('activities');

        Schema::dropIfExists('users');
    }
};