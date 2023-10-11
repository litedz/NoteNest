<div>
    <button class="bg-red-400 p-2 rounded text-white" wire:click='Hello'>Click me </button>
    <div class="fixed top-0 right-0 w-full h-full z-50">

        <div class="overlay absolute top-0 left-0 z-10 bg-gray-700 opacity-30 h-full w-full"></div>
        <div class="list bg-white">
            <div class="grid grid-cols-3 bg-white rounded-lg shadow relative z-40 mx-auto h-4/5 my-auto w-2/3 px-2 py-2 gap-2">
                <h1 class="title col-span-full text-center">Notes List</h1>
                <div class="border-2 border-slate-200 rounded-lg">
                    <div class="item">
                        <h1 class="text-center w-full bg-slate-200 py-2">Fucntionlatiy</h1>
                        <div class="notes">
                            <ul class="gap-4 grid" id="items">
                                <li class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                    <span class="fa fa-circle text-[8px] text-green-400"></span>
                                    <span class="text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Aliquam adipisci omnis sm.</span>
                                </li>
                                <li class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                    <span class="fa fa-circle text-[8px] text-green-400"></span>
                                    <span class="text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Aliquam adipisci omnis sm.</span>
                                </li>
                                <li class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                    <span class="fa fa-circle text-[8px] text-green-400"></span>
                                    <span class="text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Aliquam adipisci omnis sm.</span>
                                </li>
                                <li class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                    <span class="fa fa-circle text-[8px] text-green-400"></span>
                                    <span class="text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Aliquam adipisci omnis sm.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
