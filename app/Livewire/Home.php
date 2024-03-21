<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $posts;

    public $canLoadMore;
    public $perPageIncrement = 5;
    public $perPage = 10;



    // #[On('closeModal')]
    // #[On('post-created')]
    protected $listeners = [
        'closeModal' => 'reverseUrl',
        'post-created' => 'postCreates',
    ];

    function reverseUrl()
    {
        $this->js("history.replaceState({}, '', '/')");
    }

    // 既にデータベースに保存されている投稿（Postオブジェクト）を特定のIDに基づいて検索し、
    // その投稿を現在の投稿リストの先頭に追加する

    function postCreates($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    public function loadMore()
    {
        if (!$this->canLoadMore) {
            return null;
        }
        // increment page
        $this->perPage += $this->perPageIncrement;

        // load page
        $this->loadPosts();
    }

    function loadPosts()
    {
        $this->posts = Post::with('comments.replies')->latest()->take($this->perPage)->get();

        $this->canLoadMore = (count($this->posts) >= $this->perPage);
    }

    function mount()
    {
        // mountメソッドは、コンポーネントが初期化される時点で実行される
        $this->loadPosts();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
