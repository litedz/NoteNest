<div>
    <div x-data="{ open: false, AddFunctionsForm: false,Notes:false ,OpenDraft:false}" x-cloak
        @progress.window="$wire.FunInProgress($event.detail)" @done.window="$wire.FunEnded($event.detail)"
        x-on:created-func.window="Notes=true;AddFunctionsForm =false">
        <div class="text-white p-2 text-xs fixed left-5 bottom-0 m-2 z-40 w-16 ">
            <img src="{{asset('notenest/images/logo.png')}}" alt="Logo Package" srcset=""
                class="rounded-full cursor-pointer" @click="open=true;Notes =true">
        </div>
        <div class="fixed top-0  right-0 w-full h-full z-40 " x-show="open" x-transition>
            <span class="absolute right-0 top-0 fa fa-remove z-50 text-white font-bold text-lg cursor-pointer m-3"
                @click="open = false"></span>
            <div class="overlay absolute top-0 left-0 z-10 bg-gray-700 opacity-30 h-full w-full"></div>
            <div class="list py-14" x-show="Notes" x-transition>
                <div
                    class="grid grid-cols-3 top-2/3 bg-white rounded-lg shadow relative z-40 mx-auto h-4/5 my-auto w-2/3 px-2 py-2 gap-2">
                    <div class="w-full flex justify-between col-span-full">
                        <span @click="OpenDraft = true;Notes =false"
                            class="fa fa-solid fa-file-pen text-slate-600 text-lg  mx-3 cursor-pointer">
                        </span>
                        <div class="group relative w-1/6 flex justify-end">
                            <span @click="OpenDraft = true;Notes =false"
                                class="fa text-slate-600 text-lg mx-3 cursor-pointer fa-info group" data-tooltip-target="tooltip-info-project" >
                            </span>
                            <div id="tooltip-info-project" role="tooltip" class="group-hover:opacity-100 transition-opacity opacity-0 px-1  text-gray-100 rounded-md absolute -translate-x-1/2 translate-y-full mx-auto p-4 bg-gray-800/70  bottom-0 left-1/2 w-full">
                                <ul class="grid gap-3">
                                    <li class="flex align-middle text-[9px] justify-evenly">
                                        <span class="creation-project capitalize text-left">Date de creation project</span>
                                        <span class="date"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h1 class="title col-span-full text-center">Notes List</h1>
                    <div class="current border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">Functions</span><span
                                        class="bg-red-300 rounded-full px-2.5 text-xs py-2 text-white font-bold">{{count($AvailableFuncs)}}</span>
                                </div>
                            </div>

                            @inject('carbon', 'Carbon\Carbon')
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto" id="current-func">
                                    @foreach($AvailableFuncs as $func)
                                    <li id="{{$func->id}}"
                                        class="flex group flex-row gap-2 items-baseline first:pt-2 border-b-2 pt-2 pb-2 px-1 hover:cursor-pointer">
                                        <div class="basis-1/2">
                                            <span class="fa fa-circle text-[8px] text-red-400"></span>
                                            <span class="text-xs">{{$func->function_name}}</span>
                                        </div>
                                        <div class="basis-1/2  text-right px-2" wire:key="{{rand()}}">
                                            <button wire:click="DeleteFunc({{$func->id}})" type="button"
                                                class="bg-red-500 text-white text-xs opacity-0 p-2  transition group-hover:opacity-100">Delete</button>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                                <div @click="AddFunctionsForm =true;Notes=false"
                                    class="first:pt-2 pt-2 pb-2 px-1 hover:cursor-pointer text-center border-t shadow border-gray-500">
                                    <span class="fa-plus text-slate-500 text-lg"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="in-progress border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">in Progress</span><span
                                        class="bg-yellow-300 rounded-full  px-2.5 text-xs py-2 text-white font-bold">{{count($FuncsInProgress)}}</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto shadow" id="progress-func">
                                    @foreach($FuncsInProgress as $FunProgress)
                                    <li id="{{$FunProgress->id}}"
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pb-2 px-1 hover:cursor-pointer justify-between">
                                        <div>
                                            <span class="fa fa-solid fa-spinner text-[8px] text-yellow-400"></span>
                                            <span class="text-xs">{{$FunProgress->function_name}}.</span>
                                        </div>
                                        <span class="time text-slate-500 text-[8px]">{{
                                            $carbon->create($FunProgress->start_progress_at)->format('Y M d')
                                            }}</span>

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
                                        class="bg-green-300 rounded-full text-xs px-2.5 py-2 text-white font-bold">{{count($FuncsEnded)}}</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid h-96 overflow-y-auto shadow" id="finished-func">
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
        <div class="form fixed top-0 z-50 w-full" x-transition x-show="AddFunctionsForm">
            <div class="w-1/2 h-1/2 bg-white p-4 mx-auto mt-10 relative">
                <span class="fa fa-remove absolute right-3 cursor-pointer text-slate-400"
                    @click="AddFunctionsForm =false;Notes=true"></span>
                <h1 class="text-center border-b pb-2 mb-3"> Add function </h1>
                <div class="grid gap-4">
                    <label for="func" class="block mb-2 text-sm font-medium text-gray-900">function:</label>
                    <input type="text" name="func" placeholder="function. . ." wire:model="functionName"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('functionName') <span class="error text-white bg-red-300 p-2 rounded text-xs">{{
                        $message}}</span> @enderror
                </div>
                <div class="grid gap-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description
                        :</label>
                    <textarea id="description" rows="4" wire:model="descriptionFunc"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="description function..."></textarea>
                    @error('descriptionFunc') <span class="error text-white bg-red-300 p-2 rounded text-xs">{{
                        $message}}</span> @enderror
                </div>
                <div class="grid gap-4">

                    <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        option</label>
                    <select id="select-priority" title="select prioritys" wire:model="funcPriority"
                        class="bg-gray-50 mb-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a priority</option>
                        <option value="HIGHee" class="uppercase">HIGH</option>
                        <option value="MEDIUM" class="capitalize">medium</option>
                        <option value="LOW" class="capitalize">low</option>
                    </select>
                    @error('funcPriority') <span class="error text-white bg-red-300 p-2 rounded text-xs">{{
                        $message}}</span> @enderror
                </div>
                <div>
                    <ul class="text-xs text-slate-500 grid gap-3 w-10">
                        <li class="flex items-center gap-4 justify-between">
                            <span class="uppercase">height</span>
                            <span class="bg-red-500 relative h-3 rounded-full w-3"></span>
                        </li>
                        <li class="flex items-center gap-4 justify-between">
                            <span class="uppercase">medium</span>
                            <span class="bg-yellow-500 relative h-3 rounded-full w-3"></span>
                        </li>
                        <li class="flex items-center gap-4 justify-between">
                            <span class="uppercase">low</span>
                            <span class="bg-green-500 relative h-3 rounded-full w-3"></span>
                        </li>
                    </ul>
                </div>
                <button wire:key='{{rand()}}' type="button"
                    class="text-white rounded px-5 py-2 my-2 bg-blue-500 text-sm" wire:click="AddFunction">Add </button>
            </div>
        </div>




        <div class="draft-list" x-cloak x-transition x-show="OpenDraft == true">
            <div class="fixed left-4 w-1/4 z-40  rounded p-2 h-full bg-slate-100">
                <span class="fa fa-remove cursor-pointer absolute right-0 top-0 m-2 text-red-300"
                    @click="OpenDraft = false;Notes=true"></span>
                <h1 class="border-b pb-2 mb-2">Draft List</h1>
                <ul class="flex flex-col gap-4 overflow-y-auto h-3/5 px-2">
                    @foreach($Drafts as $draft)
                    <li
                        class="text-xs font-medium text-slate-500 flex items-center justify-between group cursor-pointer">
                        <span>{{$draft->name}}</span>
                        <span wire:click="DeleteDraft({{$draft->id}})"
                            class="fa fa-minus text-red-700 bg-red-200 rounded-full p-1 cursor-pointer group-hover:opacity-100 opacity-0 transition-all"></span>
                    </li>
                    @endforeach
                </ul>
                <div class="absolute px-2 bottom-2 w-full left-0" x-data="{openDesc:false}">
                    <div class="grid gap-2 px-2">
                        <input type="text" name="draft" placeholder="draft . . ." wire:model="DraftName"
                            wire:keydown.enter="AddDraft" class="w-full p-2 rounded focus:border-blue-500">
                        @error('DraftName') <span class="error text-white bg-red-300 p-2 rounded text-xs">{{
                            $message}}</span> @enderror
                        <div class="flex gap-2 justify-start">
                            <label for="check description" class="text-slate-500 text-xs">Add description</label>
                            <input type="checkbox" class="" id="opDesc" @click="openDesc = !openDesc" />
                        </div>
                        <textarea type="text" name="draft" placeholder="Discption . . ." wire:model="DraftDescription"
                            x-show="openDesc" x-transition class="w-full p-2 rounded focus:border-blue-500"></textarea>
                        <button wire:click="AddDraft" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                            Draft</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.addEventListener('SweatAlert', function (e) {
        console.log(e);
        let data = e.detail;
        Swal.fire(data.title, 'Click to hide window', data.icon)
    });

</script>