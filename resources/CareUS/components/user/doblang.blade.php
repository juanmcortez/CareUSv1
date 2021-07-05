<div class="flex flex-row items-center justify-between w-full mt-4">

    <div class="w-9/12 mr-2">&nbsp;</div>
</div>
<div class="flex flex-row items-center justify-between w-full mt-4">
    @isset($day, $month, $year)
    <div class="w-3/12 mr-2">
        <x-label for="month" :value="__('Birthdate')" />
        <div class="flex flex-row items-center justify-between w-full">
            <x-select id="month" class="block w-full mt-1 mr-2" name="persona[birthdate][month]" selected="{{ $month }}"
                :options="$monthOptions" />
            <x-select id="day" class="block w-full mt-1 mr-2" name="persona[birthdate][day]" selected="{{ $day }}"
                :options="$dayOptions" />
            <x-select id="year" class="block w-full mt-1" name="persona[birthdate][year]" selected="{{ $year }}"
                :options="$yearOptions" />
        </div>
    </div>
    @endisset
    @isset($language)
    <div class="w-3/12 mr-2">
        <x-label for="language" :value="__('Language')" />
        <x-select id="language" class="block w-full mt-1" name="demographic[language]" selected="{{ $language }}"
            :options="$languageOptions" />
    </div>
    @endisset
    @isset($fullName)
    <div class="flex flex-row items-center justify-start w-3/12">
        @empty($profilePhoto)
        <i class="mt-6 ml-3 mr-5 text-4xl fas fa-user-circle text-primary-700" title="{{ $fullName }}"></i>
        @else
        <img class="w-12 h-12 mt-6 ml-3 mr-5 border-2 rounded-full border-primary-500" alt="{{ $fullName }}"
            src="{{ secure_asset($profilePhoto) }}" />
        @endempty
        {{-- File upload --}}
        <div class="flex items-center justify-center w-full mt-6 mr-2">
            <label
                class="flex flex-row items-center justify-center w-full py-2 transition duration-150 ease-in-out border cursor-pointer bg-primary-100 text-primary-500 border-primary-400 hover:bg-primary-200 hover:text-primary-400">
                <i class="mr-2 text-sm fa fa-upload"></i>
                <span class="leading-normal">{{ __('Select a file') }}</span>
                <input type='file' name="persona[profile_photo]" class="hidden" />
            </label>
        </div>
        {{-- File upload --}}
    </div>
    @endisset
    <div class="w-3/12">&nbsp;</div>
</div>
