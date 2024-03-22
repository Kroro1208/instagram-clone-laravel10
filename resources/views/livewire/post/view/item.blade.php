<div class="grid lg:grid-cols-12 gap-3 h-full w-full overflow-hidden">
    <aside class="hidden lg:flex lg:col-span-7 m-auto items-center w-full overflow-hidden">
        {{--css snap scroll--}}
        <div class="relative flex overflow-x-scroll overscroll-contain w-[500px] snap-x snap-mandatory gap-2 px-2">
            @foreach ($post->media as $key => $file)
                <div class="w-full h-full shrink-0 snap-always snap-center">
                    @switch($file->mime)
                        @case('video')
                            <x-video source="{{$file->url}}"/>
                            @break
                        @case('image')
                            <img src="{{$file->url}}" alt="image" class="h-full w-full block object-scale-down">
                            @break
                        @default
                            
                    @endswitch
                </div>
            @endforeach
        </div>
    </aside>

    <aside class="lg:col-span-5 h-full scrollbar-hide relative flex gap-4 flex-col overflow-hidden overflow-y-scroll">
        <header class="flex items-center gap-3 border-b py-2 sticky top-0 bg-white z-10">
            <x-avatar story src="http://source.unsplash.com/500x500?face-{{rand(1, 10)}}" class="h-9 w-9" />
            <div class="grid grid-cols-7 w-full gap-2">
                <div class="col-span-5">
                    <h5 class="font-semibold truncate text-sm">{{$post->user->name}}</h5>
                </div>

                <div class="flex col-span-2 text-right justify-end">
                    <button wire:click="$dispatch('closeModal')" class="ml-auto text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        <main>
            <section class="flex flex-col gap-2">

                {{-- main comment --}}
                <div class="flex items-center gap-3 py-2">
                    <x-avatar story src="http://source.unsplash.com/500x500?face-{{rand(1, 10)}}" class="h-9 w-9 mb-auto"/>
                    <div class="grid grid-cols-7 w-full gap-2">
                        {{-- コメント --}}
                        <div class="col-span-6 flex flex-wrap text-sm">
                            <p>
                                <span class="font-bold text-sm mr-3">{{$post->user->name}}</span>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus fuga sapiente velit aperiam, corrupti officiis est! Facilis eaque dignissimos error alias animi placeat, incidunt doloremque quisquam, praesentium quis vitae assumenda.
                            </p>
                        </div>

                        {{-- いいね --}}
                        <div class="col-span-1 flex text-right justify-end mb-auto">
                            <button class="font-bold text-sm ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>
                        </div>

                        {{-- footer --}}
                        <div class="col-span-7 flex gap-2 text-sm items-centr text-gray-700">
                            <span>2d</span>
                            <span class="font-bold">125いいね</span>
                            <span class="font-semibold">リプライ</span>

                        </div>
                    </div>
                </div>

                {{-- Reply --}}
                <div class="flex items-center gap-3 w-11/12 ml-auto py-2">
                    <x-avatar story src="http://source.unsplash.com/500x500?face-{{rand(1, 10)}}" class="h-8 w-8 mb-auto"/>
                    <div class="grid grid-cols-7 w-full gap-2">
                        {{-- コメント --}}
                        <div class="col-span-6 flex flex-wrap text-sm">
                            <p>
                                <span class="font-bold text-sm mr-3">{{$post->user->name}}</span>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus fuga sapiente velit aperiam, corrupti officiis est! Facilis eaque dignissimos error alias animi placeat, incidunt doloremque quisquam, praesentium quis vitae assumenda.
                            </p>
                        </div>

                        {{-- いいね --}}
                        <div class="col-span-1 flex text-right justify-end mb-auto">
                            <button class="font-bold text-sm ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>
                        </div>

                        {{-- footer --}}
                        <div class="col-span-7 flex gap-2 text-sm items-centr text-gray-700">
                            <span>2d</span>
                            <span class="font-bold">125いいね</span>
                            <span class="font-semibold">リプライ</span>

                        </div>
                    </div>
                </div>

            </section>
            <div class="h-96 bg-blue-500"></div>
            <div class="h-96 bg-red-500"></div>
            <div class="h-96 bg-green-500"></div>
        </main>
        <footer class="mt-auto sticky border-t bottom-0 z-10 bg-white">
            <div class="flex gap-4 items-center my-2">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send w-5 h-5" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg>
                </span>
                <span class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </span>
            </div>
    
            {{--likes and views--}}
            <p class="font-bold text-sm">105557 いいね</p>
    
            {{--name and comment--}}
            <div class="flex text-sm gap-2 font-medium">
                <p><strong class="font-bold">{{$post->user->name}}</strong>{{$post->description}}</p>
            </div>
    
            {{--view post model--}}
            <button onclick="Livewire.dispatch('openModal', {component:'post.view.modal', arguments:{'post':{{$post->id}}}})" class="text-gray-500/90 text-sm font-medium">{{$post->comments->count()}}件のコメントを見る</button>
    
            {{--leave comment--}}
            <form x-data="{inputText:''}" class="grid grid-cols-12 items-center w-full">
                @csrf
                <input x-model="inputText" type="text" placeholder="コメントを追加..." class="border-0 col-span-10 placeholder:text-sm outline-none focus:outline-none px-0 rounded-lg hover:ring-0 focus:ring-0">
                <div class="col-span-1 ml-auto flex justify-end text-right">
                    <button x-cloak x-show="inputText.length>0" class="text-sm font-semibold flex justify-end text-blue-500">
                        投稿する
                    </button>
                </div>
                <span class="col-span-1 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                    </svg>
                </span>
            </form>
        </footer>
    
    </aside>
</div>
