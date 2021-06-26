<div class="flex flex-row items-center justify-between w-full">
    @isset($username)
    <div class="w-3/12 mr-2">
        <x-label for="username" :value="__('Username')" />
        <x-input id="username" class="block w-full mt-1" type="text" name="user[username]" value="{{ $username }}"
            placeholder="{{ __('Username') }}" />
    </div>
    @endisset
    @isset($email)
    <div class="w-3/12 mr-2">
        <x-label for="email" :value="__('E-mail')" />
        <x-input id="email" class="block w-full mt-1" type="text" name="user[email]" value="{{ $email }}"
            placeholder="{{ __('E-mail') }}" />
    </div>
    @endisset
    <div class="w-6/12">&nbsp;</div>
</div>
