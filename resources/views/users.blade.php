<x-admin.template title="Users">

    <section class="section">

        <h1 class="title">Users</h1>

        <div class="grid gap-5">
            @foreach ($users as $user)
                <div class="card">
                    <div class="flex flex-col xs:flex-row justify-between items-center gap-5">
                        <div class="flex items-center gap-4">
                            <img class="w-[37.5px] md:w-[42.5px] aspect-square rounded-full shadow-lg object-cover"
                                src="{{ $user->avatar_link }}" alt="Avatar Image">
                            <div class="flex flex-col">
                                <span class="text-sm font-medium">{{ $user->name }}</span>
                                <span class="text-[0.55rem] sm:text-[0.7rem] text-gray-500 font-normal">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button"
                                class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white modal-trigger"
                                data-target="#userDetailsModal-{{ $loop->iteration }}">
                                <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-eye"></i>
                            </button>

                            <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white pointer-events-none opacity-50"
                                href="#">
                                <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-edit"></i>
                            </a>

                            <a class="w-[30px] sm:w-[35px] aspect-square grid place-items-center rounded-md bg-blue-500 hover:bg-blue-600 text-white pointer-events-none opacity-50"
                                href="#">
                                <i class="text-[1rem] sm:text-[1.15rem] pointer-events-none uil uil-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="modal" id="userDetailsModal-{{ $loop->iteration }}">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                            <div class="header">
                                <h4>User Details</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <div class="mb-5">
                                            <label class="label">Nama</label>
                                            <span class="ml-1">: {{ $user->name }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Email</label>
                                            <span class="ml-1">: {{ $user->email }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Username</label>
                                            <span class="ml-1">: {{ $user->username }}</span>
                                        </div>
                                        <div class="mb-5">
                                            <label class="label">Role</label>
                                            <div class="ml-1">
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach ($user->roles ?? [] as $role)
                                                        <span
                                                            class="bg-blue-400 text-[0.7rem] text-white font-normal rounded-md px-2 py-1">
                                                            {{ $role->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                            <div class="footer flex justify-end gap-x-5">
                                <button type="button"
                                    class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

</x-admin.template>
