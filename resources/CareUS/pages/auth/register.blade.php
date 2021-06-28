<x-careus-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Full name -->
            <div class="mt-4">
                <x-label for="last_name" :value="__('Name')" />

                <x-input id="last_name" class="inline-block w-1/3 mt-1" type="text" name="last_name"
                    :value="old('last_name')" placeholder="{{ __('Last') }}" required />
                <x-input id="first_name" class="inline-block w-1/3 mx-3 mt-1" type="text" name="first_name"
                    :value="old('first_name')" placeholder="{{ __('First') }}" required />
                <x-input id="middle_name" class="inline-block w-1/4 mt-1" type="text" name="middle_name"
                    :value="old('middle_name')" placeholder="{{ __('Middle') }}" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-careus-layout>
