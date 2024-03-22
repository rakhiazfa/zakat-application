<x-admin.template title="Profile">

    @if (session('success'))
        <div class="alert success mb-5">
            <p>{{ session('success') }}</p>
            <i class="close-alert uil uil-times"></i>
        </div>
    @endif

    <section class="section">

        <div class="grid grid-cols-1 xl:grid-cols-[1fr,325px] gap-5">

            <div class="card h-max p-5">
                <h4 class="card-title mb-4">Profile</h4>
                <hr>
                <div class="flex flex-col md:flex-row items-start gap-7 mt-5">
                    <div class="w-full xs:w-[217.5px] mx-auto">
                        <img class="w-full xs:w-[217.5px] aspect-square rounded-md shadow-lg mb-5 object-cover"
                            src="{{ $user->avatar_link }}" alt="Avatar Image">
                        <button class="button sm w-full bg-gray-50 hover:bg-gray-100 border text-dark modal-trigger"
                            data-target="#changeAvatarModal">
                            Change Avatar
                        </button>
                    </div>

                    <div class="w-full">
                        <form method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-5">

                                <div class="field">
                                    <label class="label">Name</label>
                                    <input type="text" class="control" name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <p class="invalid-field">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label">Username</label>
                                    <input type="text" class="control" name="username" value="{{ $user->username }}">
                                    @error('username')
                                        <p class="invalid-field">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label">Email</label>
                                    <input type="text" class="control" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <p class="invalid-field">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="button bg-blue-500 hover:bg-blue-600 text-white">
                                        Save
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="card h-max p-5">
                <div class="card-title mb-4">Roles</div>
                <hr>
                <div class="flex flex-wrap gap-1 mt-5">
                    @foreach ($user->roles ?? [] as $role)
                        <span class="bg-blue-400 text-[0.7rem] text-white font-normal rounded-md px-2 py-1">
                            {{ $role->name }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>

    </section>

    <section>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

            <div class="card h-max p-5">
                <h4 class="card-title mb-4">Change Password</h4>
                <hr>
                <div class="card-body mt-5">
                    <form action="{{ route('profile.change_password') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="grid gap-5">

                            <div class="field">
                                <label class="label">Old Password</label>
                                <input type="password" class="control" name="old_password">
                                @error('old_password')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label">New Password</label>
                                <input type="password" class="control" name="new_password">
                                @error('new_password')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label class="label">Confirm New Password</label>
                                <input type="password" class="control" name="new_password_confirmation">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="button bg-blue-500 hover:bg-blue-600 text-white">
                                    Change
                                </button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

            <div class="card h-max p-5">
                <h4 class="card-title text-red-500 mb-4">Delete Account</h4>
                <hr>
                <div class="card-body mt-5">
                    <p class="text-xs xl:text-[0.7rem] font-normal mb-5">
                        Once you delete your account, there is no going back. Please be certain.</p>
                    <button type="button"
                        class="button sm border border-red-500 bg-red-50 hover:bg-red-100 text-red-600 modal-trigger mb-2"
                        data-target="#deleteAccountModal">
                        Delete
                    </button>
                </div>
            </div>

        </div>

    </section>

    <div class="modal" id="changeAvatarModal">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="header">
                    <h4>Change Avatar</h4>
                </div>
                <div class="body">
                    <form action="{{ route('profile.change_avatar') }}" method="POST" enctype="multipart/form-data"
                        id="changeAvatarForm">
                        @csrf
                        @method('PATCH')
                        <input type="file" class="hidden" name="avatar" accept="image/*" id="avatarField">
                    </form>
                    <div class="w-full xs:w-[217.5px] aspect-square rounded-md relative mx-auto">
                        <img class="w-full xs:w-[217.5px] aspect-square rounded-md shadow-lg object-cover"
                            src="{{ $user->avatar_link }}" id="previewAvatar" alt="Avatar Image">
                        @error('avatar')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                        <div class="absolute top-0 left-0 w-full h-full bg-[rgba(0,0,0,0.7)] rounded-md grid place-items-center transition-all duration-300 cursor-pointer click-trigger opacity-0 hover:opacity-100"
                            data-target="#avatarField">
                            <span class="text-base text-white font-medium">Upload Avatar</span>
                        </div>
                    </div>
                </div>
                <div class="footer flex justify-end gap-x-5">
                    <button type="button"
                        class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                        Cancel
                    </button>
                    <button type="button"
                        class="button sm border bg-blue-500 hover:bg-blue-600 text-white form-trigger"
                        data-target="#changeAvatarForm">
                        Change
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteAccountModal">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="header">
                    <h4>Are you absolutely sure?</h4>
                </div>
                <div class="body">
                    <form action="{{ route('profile.destroy') }}" method="POST" id="deleteAccountForm">
                        @csrf
                        @method('DELETE')

                        <div class="fie">
                            <label class="label">Confirm Your Email</label>
                            <input type="text" class="control" name="email_confirmation"
                                placeholder="Please confirm your email . . .">
                            @error('email_confirmation')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="footer flex justify-end gap-x-5">
                    <button type="button"
                        class="button sm bg-gray-50 hover:bg-gray-100 text-dark border modal-cancel-trigger">
                        Cancel
                    </button>
                    <button type="button"
                        class="button sm border border-red-500 bg-red-50 hover:bg-red-100 text-red-600 form-trigger"
                        data-target="#deleteAccountForm" aria-label="Delete Account">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        @vite('resources/js/pages/profile.js')
    @endsection

</x-admin.template>
