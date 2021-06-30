<x-careus-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-logo class="w-20 h-20 text-gray-500 fill-current" />
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="relative mt-4" x-data="{ show: true }">
                <x-label for="password" :value="__('Password')" />

                <input
                    class="block w-full pr-10 mt-1 transition duration-150 ease-in-out shadow-sm border-primary-200 focus:border-primary-500 focus:ring-0 text-dark-400 focus:text-dark-600 placeholder-dark-200"
                    :type="show ? 'password' : 'text'" name="password" required autocomplete="current-password"
                    id="password" />
                <div @click="show=! show"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5 cursor-pointer">
                    <i class="mt-6 text-lg fa text-dark-300" :class=" show ? 'fa-eye' : 'fa-eye-slash' "
                        :title=" show ? 'Show password' : 'Hide password' "></i>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="border-gray-300 rounded shadow-sm cursor-pointer text-primary-600 focus:border-primary-300 focus:ring-0 focus:ring-primary-200"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-careus-layout>
