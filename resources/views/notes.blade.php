<div>
    <div x-data="{ open: false }">
        <button @click="open =true" class="text-white p-2 rounded-lg text-xs fixed left-0 top-0 m-2 z-40 bg-green-500"
            type="button">Click me </button>
        <div class="fixed top-0  right-0 w-full h-full z-40 " x-show="open" x-transition>
            <span class="absolute right-0 top-0 fa fa-remove z-50 text-white font-bold text-lg cursor-pointer m-3"
                @click="open =false"></span>
            <div class="overlay absolute top-0 left-0 z-10 bg-gray-700 opacity-30 h-full w-full"></div>
            <div class="list py-14">
                <div
                    class="grid grid-cols-3 top-2/3 bg-white rounded-lg shadow relative z-40 mx-auto h-4/5 my-auto w-2/3 px-2 py-2 gap-2">
                    <h1 class="title col-span-full text-center">Notes List</h1>
                    <div class="current border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">Functions</span><span class="bg-red-300 rounded-full px-2 text-xs py-2 text-white font-bold">25</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid" id="current-func">
                                    <li
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pt-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-red-400"></span>
                                        <span class="text-xs"> Edit profile.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-red-400"></span>
                                        <span class="text-xs"> authantication </span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-red-400"></span>
                                        <span class="text-xs"> Home page.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-red-400"></span>
                                        <span class="text-xs">Logout.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="in-progress border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">in Progress</span><span class="bg-yellow-300 rounded-full px-2 text-xs py-2 text-white font-bold">25</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid" id="progress-func">
                                    <li
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-yellow-400"></span>
                                        <span class="text-xs"> Edit profile.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-yellow-400"></span>
                                        <span class="text-xs"> authantication </span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-yellow-400"></span>
                                        <span class="text-xs"> Home page.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-circle text-[8px] text-yellow-400"></span>
                                        <span class="text-xs">Logout.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="finished border-2 border-slate-200 rounded-lg">
                        <div class="step">
                            <div class="text-center w-full bg-slate-200 py-2">
                                <div class="flex items-center justify-center gap-3">
                                    <span class="capitalize">Done</span><span class="bg-green-300 rounded-full px-2 text-xs py-2 text-white font-bold">25</span>
                                </div>
                            </div>
                            <div class="notes">
                                <ul class="gap-4 grid" id="finished-func">
                                    <li
                                        class="flex flex-row gap-2 items-baseline first:pt-2 border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-check text-[8px] text-green-400"></span>
                                        <span class="text-xs"> Edit profile.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-check text-[8px] text-green-400"></span>
                                        <span class="text-xs"> authantication </span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-check text-[8px] text-green-400"></span>
                                        <span class="text-xs"> Home page.</span>
                                    </li>
                                    <li
                                        class="flex flex-row gap-2 items-baseline border-b-2 pb-2 px-1 hover:cursor-pointer">
                                        <span class="fa fa-check text-[8px] text-green-400"></span>
                                        <span class="text-xs">Logout.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
