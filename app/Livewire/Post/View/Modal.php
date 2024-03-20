<?php

namespace App\Livewire\Post\View;

use App\Models\Post;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $post;

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    // escapeを押したときにモーダルウィンドウを自動的に閉じるかどうかを制御
    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    function mount()
    {
        $this->post = Post::findOrFail($this->post);
        $url = url('post/' . $this->post->id);

        $this->js("history.pushState({},'', '{$url}')");
    }

    public function render()
    {
        return <<<'BLADE'
        <main class="bg-white h-[calc(100vh_-_3.5rem)] md:h-[calc(100vh_-_5rem)] flex flex-col border gap-y-4 px-5">
            
            <livewire:post.view.item :post="$this->post" />
            
        </main>
        BLADE;
    }
}
