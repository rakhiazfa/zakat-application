<x-template title="Sign In">

    <main class="min-h-screen max-w-[1560px] mx-auto overflow-x-hidden">

        <section class="min-h-screen grid grid-cols-1 lg:grid-cols-[1fr,500px]">

            <div class="bg-blue-600 bg-gradient-to-br from-blue-600 to-blue-800"></div>

            <div class="min-h-screen grid place-items-center">

                <div class="py-10 px-5">

                    <h4 class="text-2xl font-semibold mb-3">Sign In</h4>
                    <p class="text-sm text-gray-500 form-normal mb-7">
                        Welcome Back, please enter your credentials to continue.
                    </p>

                    @if (session('success'))
                        <div class="alert success mb-5">
                            <p>{{ session('success') }}</p>
                            <i class="close-alert uil uil-times"></i>
                        </div>
                    @endif

                    <form method="POST">
                        @csrf

                        <div class="grid gap-7">

                            <div class="field">
                                <label class="label">Username</label>
                                <input type="text" class="control" name="email_or_username"
                                    value="{{ old('email_or_username') }}"
                                    placeholder="Enter your email or username . . .">
                                @error('email_or_username')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <div class="flex justify-between items-center">
                                    <label class="label">Password</label>
                                    <a class="label" href="#">Forgot password?</a>
                                </div>
                                <input type="password" class="control" name="password"
                                    placeholder="Enter your password . . .">
                                @error('password')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center gap-2 ml-2">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="text-sm text-gray-500 font-medium">Remember Me</label>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="button bg-emerald-500 hover:bg-emerald-600 text-white">
                                    Sign In
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</x-template>
