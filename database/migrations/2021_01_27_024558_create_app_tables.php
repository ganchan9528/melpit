<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();
        });

        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('primary_category_id');
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();

            $table->foreign('primary_category_id')
                ->references('id')
                ->on('primary_categories');
        });

        Schema::create('item_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_no');
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('secondary_category_id');
            $table->unsignedBigInteger('item_condition_id');

            $table->string('name');
            $table->string('image_file_name');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->string('state');
            $table->timestamp('bought_at')->nullable();

            $table->timestamps();

            $table->foreign('seller_id')
                ->references('id')
                ->on('users');

            $table->foreign('buyer_id')
                ->references('id')
                ->on('users');

            $table->foreign('secondary_category_id')
                ->references('id')
                ->on('secondary_categories');

            $table->foreign('item_condition_id')
                ->references('id')
                ->on('item_conditions');
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');

            $table->index('id');
            $table->index('user_id');
            $table->index('item_id');

            $table->unique([
                'user_id',
                'item_id'
            ]);

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('quantity');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('item_id')
                ->references('id')
                ->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_conditions');
        Schema::dropIfExists('secondary_categories');
        Schema::dropIfExists('primary_categories');
    }
}
