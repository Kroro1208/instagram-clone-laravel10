<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    // 既にデータベースに保存されている投稿（Postオブジェクト）を特定のIDに基づいて検索し、
    // その投稿を現在の投稿リストの先頭に追加する
    #[On('post-created')]
    function postCreates($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    function mount()
    {
        // mountメソッドは、コンポーネントが初期化される時点で実行される
        $this->posts = Post::latest()->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
