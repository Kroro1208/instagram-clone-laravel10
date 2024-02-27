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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->boolean('hide_like_view')->default(false); // 投稿の「いいね」数をユーザーに表示するかどうか
            $table->boolean('allow_commenting')->default(false); // 投稿に対してコメントを許可するかどうか
            $table->enum('type', allowed:['post', 'reel']); // 投稿されたpostのtypeを条件分岐してpostかreelをカラムに追加する
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
