<header class="topbar">
    <div class="topbar-container">
        <div class="topbar-left">
            <button type="button" class="sidebar-toggler lg:hidden">
                <i class="uil uil-bars"></i>
            </button>
            <form class="hidden lg:block">
                <div class="field">
                    <input type="text" class="control rounded" name="key" placeholder="Search . . .">
                </div>
            </form>
        </div>
        <div class="topbar-right">
            <div class="dropdown">
                <a class="user-dropdown dropdown-toggler" href="javascript:void(0);">
                    <img class="w-[37.5px] md:w-[42.5px] aspect-square rounded-full shadow-lg object-cover"
                        src="{{ $user->avatar_link }}" alt="Avatar Image">
                    <div class="flex flex-col">
                        <span class="text-xs md:text-sm font-medium"> {{ $user->name ?? 'Rakhi Azfa Rifansya' }}
                        </span>
                        <span class="text-[0.55rem] sm:text-[0.7rem] text-gray-500 font-normal">
                            {{ Str::limit(implode(' | ', $user->roles->pluck('name')->toArray()), 20) }}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-link" href="{{ route('profile') }}">
                        <i class="uil uil-user-circle"></i>
                        <span> Profile </span>
                    </a>

                    <a class="dropdown-link" href="#">
                        <i class="uil uil-setting"></i>
                        <span> Setting </span>
                    </a>

                    <hr>

                    <a class="dropdown-link" href="{{ route('auth.signout') }}">
                        <i class="uil uil-sign-out-alt"></i>
                        <span> Logout </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>
