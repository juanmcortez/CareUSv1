<div class="flex flex-row items-center justify-between w-full mt-10">
    @isset($street)
    <div class="w-3/12 mr-2">
        <x-label for="street" :value="__('Address')" />
        <x-input id="street" class="block w-full mt-1" type="text" name="address[street]" value="{{ $street }}"
            placeholder="{{ __('Street') }}" />
    </div>
    @endisset
    @isset($streetExtended)
    <div class="w-3/12 mr-2">
        <x-label for="street_extended" value="&nbsp;" />
        <x-input id="street_extended" class="block w-full mt-1" type="text" name="address[street_extended]"
            value="{{ $streetExtended }}" placeholder="{{ __('Extended') }}" />
    </div>
    @endisset
    @isset($city)
    <div class="w-3/12 mr-2">
        <x-label for="city" value="&nbsp;" />
        <x-input id="city" class="block w-full mt-1" type="text" name="address[city]" value="{{ $city }}"
            placeholder="{{ __('City') }}" />
    </div>
    @endisset
    <div class="w-3/12">&nbsp;</div>
</div>
<div class="flex flex-row items-center justify-between w-full mt-2">
    @isset($state)
    <div class="w-3/12 mr-2">
        <x-select id="state" class="block w-full mt-2" name="address[state]" selected="{{ $state }}"
            :options="$stateOptions" />
    </div>
    @endisset
    @isset($zip)
    <div class="w-3/12 mr-2">
        <x-input id="zip" class="block w-full mt-2" type="text" name="address[zip]" value="{{ $zip }}"
            placeholder="{{ __('Postal Code') }}" />
    </div>
    @endisset
    @isset($country)
    <div class="w-3/12 mr-2">
        <x-select id="country" class="block w-full mt-2" name="address[country]" selected="{{ $country }}"
            :options="$countryOptions" />
    </div>
    @endisset
    <div class="w-3/12">&nbsp;</div>
</div>
