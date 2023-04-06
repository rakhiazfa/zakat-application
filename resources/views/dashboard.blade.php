<x-admin.template title="Dashboard">

    <section class="section">

        <h1 class="title">Dashboard</h1>

        <div class="grid grid-cols-1 xl:grid-cols-[300px,1fr] gap-5">

            <div class="card p-0">
                <div class="bg-blue-100 rounded-t-md p-4 mb-5">
                    <div class="card-title text-blue-600">Welcome Back !</div>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="flex items-center gap-3 mb-5">
                        <img class="w-[55px] aspect-square rounded-full shadow-lg object-cover"
                            src="{{ auth()->user()->avatar_link }}" alt="Avatar Image">
                        <div class="flex flex-col">
                            <span
                                class="text-sm text-gray-500 font-normal">{{ auth()->user()->name ?? 'Rakhi Azfa Rifansya' }}</span>
                            <span class="text-xs text-gray-500">
                                {{ Str::limit(implode(' | ',auth()->user()->roles->pluck('name')->toArray()),20) }}
                            </span>
                        </div>
                    </div>

                    <a class="button w-full bg-blue-500 hover:bg-blue-600 text-white" href="{{ route('profile') }}">
                        View Profile
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 xl:grid-cols-4 gap-5">

                <div class="card h-max">
                    <h1 class="card-title sm text-gray-500 mb-5">Total Revenue</h1>
                    <div class="card-body">
                        <div class="flex items-center gap-5">
                            <i class="text-2xl uil uil-credit-card"></i>
                            <span class="font-semibold"> $ 324.0 </span>
                        </div>
                    </div>
                </div>

                <div class="card h-max">
                    <h1 class="card-title sm text-gray-500 mb-5">Total Products</h1>
                    <div class="card-body">
                        <div class="flex items-center gap-5">
                            <i class="uil uil-shopping-bag -mt-1"></i>
                            <span class="font-semibold"> 128 </span>
                        </div>
                    </div>
                </div>

                <div class="card h-max">
                    <h1 class="card-title sm text-gray-500 mb-5">Total Users</h1>
                    <div class="card-body">
                        <div class="flex items-center gap-5">
                            <i class="text-2xl uil uil-user"></i>
                            <span class="font-semibold"> {{ $userCount }} </span>
                        </div>
                    </div>
                </div>

                <div class="card h-max">
                    <h1 class="card-title sm text-gray-500 mb-5">Online Users</h1>
                    <div class="card-body">
                        <div class="flex items-center gap-5">
                            <div class="relative">
                                <i class="text-2xl uil uil-user"></i>
                                <span class="absolute top-[-5px] right-[-5px] flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                                </span>
                            </div>
                            <span class="font-semibold"> {{ $onlineUserCount }} </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</x-admin.template>
