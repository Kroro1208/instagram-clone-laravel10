<div class="bg-white lg:h-[500px] flex flex-col border gap-y-4 px-5">
    {{-- In work, do what you enjoy. --}}
    <header class="w-full py-2 border-b">
        <div class="flex justify-between">
            <button wire:click="$dispatch('closeModal')" class="font-semibold">
                X
            </button>
            <div class="text-lg font-bold">
                投稿を作成
            </div>
            <button class="text-blue-500 font-bold">
                シェアする
            </button>
        </div>
    </header>

    <main class="grid grid-cols-12 gap-3 h-full w-full overflow-hidden">
        <!-- overflow-scroll -->
        <aside class="lg:col-span-7 m-auto items-center w-full ">
            @if(count($media)==0)
            <label for="customFileInput" class="m-auto max-w-fit flex-col flex gap-3 cursor-pointer">
                <input wire:model='media' type="file" multiple accept=".jpg, .png, .jpeg" id="customFileInput" class="sr-only">
                <span class="m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </span>
                <span class="bg-blue-500 text-white text-sm rounded-lg p-2 px-4">
                    画像をアップロードする
                </span>
            </label>
            @else
            <div class="flex overflow-x-scroll w-[500px] h-96 snap-x snap-mandatory gap-2 px-2">
                @foreach($media as $key => $file)
                <div class="w-full h-full shrink-0 snap-always snap-center">
                    @if(strpos($file->getMimeType(), 'image')!==false)
                    <img src="{{$file->temporaryUrl()}}" alt="" class="w-full h-full object-contain">
                    @elseif(strpos($file->getMimeType(), 'video')!==false)
                    <x-video :source="$file->temporaryUrl()" />
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </aside>
        <aside class="lg:col-span-5 h-full border-l p-3 flex gap-4 flex-col overflow-hidden overflow-y-scroll">
            <div class="flex item-center gap-2">
                <x-avatar class="w-9 h-9" />
                <h5 class="font-bold">{{fake()->name()}}</h5>
            </div>
            <div>
                <textarea placeholder="説明を追加する" class="border-0 focus:border-0 px-0 w-full rounded-lg bg-white h-32 focus:outline-none focus:ring-0" name="" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="w-full items-center">
                <input type="text" placeholder="場所を追加" class="border-0 focus:border-0 px-0 w-full rounded-lg bg-white focus:outline-none focus:ring-0">
            </div>
            <div class="">
                <h6 class="text-gray-500 font-medium text-base">詳細な設定</h6>
                <ul>
                    <li>
                        <div class="flex item-center gap-3 justify-between">
                            <p>「いいね！」と「閲覧数」を非表示にする</p>
                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="flex item-center gap-3 justify-between">
                            <p>コメントを非表示にする</p>
                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
</div>