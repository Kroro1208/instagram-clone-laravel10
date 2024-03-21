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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // コメントの階層構造を実現するために、親コメントのIDを参照するカラムです。このフィールドにより、コメントが他のコメントに対する返信であることを示すことができます。
            $table->unsignedBigInteger('parent_id')->nullable();

            // parent_idカラムを、同じcommentsテーブルのidカラムに対する外部キーとして設定し、親コメントが削除された場合にその子コメントも削除される
            // ※foreign()は、既に存在するカラムに外部キー制約を追加するために使用されます
            $table->foreign('parent_id')->references('id')->on('comments')->cascadeOnDelete();
            $table->integer('commentable_id')->nullable()->unsigned(); // コメントが関連付けられる対象（例: 記事や画像など）のID
            $table->string('commentable_type')->nullable(); // これもポリモーフィック関連に使用され、commentable_idと組み合わせて、コメントがどのモデルタイプ（例: App\Models\ArticleやApp\Models\Imageなど）に関連付けられているかを示す。

            $table->mediumText('body')->nullable(); // コメントの本文を保存するためのカラム
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
