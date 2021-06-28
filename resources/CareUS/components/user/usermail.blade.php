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
        <div class="flex flex-row items-center justify-between w-full">
            <x-input id="email" class="block w-11/12 mt-1" type="text" name="user[email]" value="{{ $email }}"
                placeholder="{{ __('E-mail') }}" />
            @if($verified)
            <i class="p-3 mt-1 text-green-100 bg-green-500 border border-green-500 rounded-r text-md fa fa-check"
                title="{{ __('Verified e-mail address! Thank You.') }}"></i>
            @else
            <i type="submit"
                class="p-3 mt-1 text-red-100 bg-red-500 border border-red-500 rounded-r text-md fa fa-times"
                title="{{ __('Click here for e-mail verification!') }}"></i>
            @endif
        </div>
    </div>
    <div class="w-3/12 mr-2">
        @if($verified)
        <div class="w-full mt-6 text-sm text-green-500">&nbsp;</div>
        @else
        <div class="w-full mt-6 text-sm text-red-500">
            {!! __('Thanks for signing up! Please verify your email address by') !!}
            {!! __('clicking on the <strong>red box</strong> next to it, to receive an email from us.') !!}
        </div>
        @endif
    </div>
    @endisset
    <div class="w-3/12">&nbsp;</div>
</div>
