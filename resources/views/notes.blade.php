<div>
    <div x-data="{ open: false, formFunctions: false }" @progress.window="$wire.FunInProgress($event.detail)"
        @done.window="$wire.FunEnded($event.detail)">
        <button @click="open = true" class="text-white p-2 rounded-lg text-xs fixed left-10 top-0 m-2 z-40 bg-green-500"
            type="button">Click me </button>
        <div class="fixed top-0  right-0 w-full h-full z-40 " x-show="open" x-transition>
            <span class="absolute right-0 top-0 fa fa-remove z-50 text-white font-bold text-lg cursor-pointer m-3"
                @click="open = false"></span>
            <div class="overlay absolute top-0 left-0 z-10 bg-gray-700 opacity-30 h-full w-full"></div>
            <div class="list py-14" x-show="!formFunctions">
                <div
                    class="grid grid-cols-3 top-2/3 bg-white rounded-lg shadow relative z-40 mx-auto h-4/5 my-auto w-2/3 px-2 py-2 gap-2">
                    <h1 class="title col-span-full text-center">Notes List</h1>
                    <div class="current border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">Functions</span><span
                                        class="bg-red-300 rounded-full px-2 text-xs py-2 text-white font-bold">{{count($AvailableFuncs)}}</span>
                                </div>
                            </div>

                            @inject('carbon', 'Carbon\Carbon')
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto" id="current-func">
                                    @foreach($AvailableFuncs as $func)
                                    <li id="{{$func->id}}"
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pt-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-red-400"></span>
                                        <span class="text-xs">{{$func->function_name}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="in-progress border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">in Progress</span><span
                                        class="bg-yellow-300 rounded-full px-2 text-xs py-2 text-white font-bold">{{count($FuncsInProgress)}}</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto" id="progress-func">
                                    @foreach($FuncsInProgress as $FunProgress)
                                    <li id="{{$FunProgress->id}}"
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pb-2 px-1 hover:cursor-pointer justify-between">
                                        <div>
                                            <span class="fa fa-solid fa-spinner text-[8px] text-yellow-400"></span>
                                            <span class="text-xs">{{$FunProgress->function_name}}.</span>
                                        </div>
                                        <span
                                            class="time text-slate-500 text-[8px]">{{$FunProgress->start_progress_at}}</span>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="finished border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">Done</span><span
                                        class="bg-green-300 rounded-full px-2 text-xs py-2 text-white font-bold">{{count($FuncsEnded)}}</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto" id="finished-func">
                                    @foreach($FuncsEnded as $funcEnded)
                                    <li id="{{$funcEnded->id}}"
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pb-2 px-1 hover:cursor-pointer justify-between">
                                        <div>
                                            <span class="fa fa-check text-green-600 px-3"></span>
                                            <span class="text-xs"> {{$funcEnded->function_name}}.</span>
                                        </div>
                                        <span class="time text-slate-500 text-[8px]">
                                            {{
                                            $carbon->create($funcEnded->created_at)->format('Y M d')
                                            }}
                                        </span>

                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="form fixed top-0 z-50 w-full" x-transition="" x-show="formFunctions">


            <div class="w-1/2 h-1/2 bg-white p-4 mx-auto mt-10">
                <h1 class="text-center border-b pb-1"> Add function </h1>
                <div>

                    <label for="func" class="block mb-2 text-sm font-medium text-gray-900">function
                        :</label>
                    <input type="text" name="func" placeholder="function. . ."
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                </div>
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description
                        :</label>
                    <textarea id="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="description function..."></textarea>
                </div>
                <button type="button" class="text-white rounded px-5 py-2 my-2 bg-blue-500 text-sm"
                    @click="$wire.Hello">Add </button>
            </div>



        </div>
        <div class="draft-list">
            <div class="fixed left-0 w-1/4 z-40 bg-white h-full m-4 rounded p-2">
                <h1 class="border-b pb-2 mb-2">Draft List</h1>
                <ul class="grid">
                    <template x-for="i in 5">
                        <li x-text="i+'lorem '">

                        </li>
                    </template>
                </ul>



            </div>
        </div>
    </div>
</div>