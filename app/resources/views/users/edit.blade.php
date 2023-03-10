<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <body class="antialiased font-sans bg-gray-200">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">User / {{ $user->id }}</h2>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <article class="rounded-xl border border-gray-700 bg-gray-800 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <div class="icon icon-{{ $user->icon_color }} h-16 w-16 rounded-full object-cover">{{$user->icon}}</div>


                                    <div>
                                        <h3 class="text-lg font-medium text-white">{{ $user->name }}</h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                    <a href="#" class="text-xs font-medium text-gray-300"> {{ $user->user_info->job }} </a>
                                                </li>

                                                <li class="p-1 leading-none">
                                                    <a href="#" class="text-xs font-medium text-gray-300">  </a>
                                                </li>

                                                <li class="p-1 leading-none">
                                                    <a href="#" class="text-xs font-medium text-gray-300"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        <a
                                            href="#"
                                            class="block h-full rounded-lg {{ $user->is_active }} p-4 hover:border-pink-600"
                                        >
                                            <strong class="font-medium">{{ $user->is_active }}</strong>
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            href="#"
                                            class="block h-full rounded-lg border border-gray-700 p-4 hover:border-pink-600"
                                        >
                                            <strong class="font-medium text-white">Project B</strong>

                                            <p class="mt-1 text-xs font-medium text-gray-300">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente
                                                cumque saepe sit.
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </article>


                        </div>
                    </div>
                </div>
                </body>
            </div>
        </div>
    </div>

</x-app-layout>
