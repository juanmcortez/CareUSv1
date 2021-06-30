<div class="flex flex-row items-center justify-between w-full mt-10">
    @isset($lastName)
    <div class="w-3/12 mr-2">
        <x-label for="last_name" :value="__('Name')" />
        <x-input id="last_name" class="block w-full mt-1" type="text" name="persona[last_name]" value="{{ $lastName }}"
            placeholder="{{ __('Last') }}" />
    </div>
    @endisset
    @isset($firstName)
    <div class="w-3/12 mr-2">
        <x-label for="first_name" value="&nbsp;" />
        <x-input id="first_name" class="block w-full mt-1" type="text" name="persona[first_name]"
            value="{{ $firstName }}" placeholder="{{ __('First') }}" />
    </div>
    @endisset
    @isset($middleName)
    <div class="w-3/12 mr-2">
        <x-label for="middle_name" value="&nbsp;" />
        <x-input id="middle_name" class="block w-full mt-1" type="text" name="persona[middle_name]"
            value="{{ $middleName }}" placeholder="{{ __('Middle') }}" />
    </div>
    @endisset
    <div class="w-3/12">&nbsp;</div>
</div>
