<div class="flex flex-row items-center justify-start w-full mt-10">
    @isset($intlCode)
    <div class="w-1/12 mr-2">
        <x-label for="plussign" :value="__('Phone')" />
        <div class="inline-flex items-center justify-center w-full">
            <p class="mx-3 mt-1">+</p>
            <x-input id="intl_code" class="block w-full mt-1 text-center" type="text" name="phone[intl_code]"
                value="{{ $intlCode }}" placeholder="1" />
        </div>
    </div>
    @endisset
    @isset($areaCode)
    <div class="w-1/12 mr-2">
        <x-label for="area_code" value="&nbsp;" />
        <div class="inline-flex items-center justify-center w-full">
            <p class="mx-3 mt-1">(</p>
            <x-input id="area_code" class="block w-full mt-1 text-center" type="text" name="phone[area_code]"
                value="{{ $areaCode }}" placeholder="000" />
        </div>
    </div>
    @endisset
    @isset($prefix)
    <div class="w-1/12 mr-2">
        <x-label for="prefix" value="&nbsp;" />
        <div class="inline-flex items-center justify-center w-full">
            <p class="mx-3 mt-1">)</p>
            <div class="inline-flex items-center justify-center w-full">
                <x-input id="prefix" class="block w-full mt-1 text-center" type="text" name="phone[prefix]"
                    value="{{ $prefix }}" placeholder="000" />
            </div>
        </div>
    </div>
    @endisset
    @isset($line)
    <div class="w-1/12 mr-2">
        <x-label for="line" value="&nbsp;" />
        <div class="inline-flex items-center justify-center w-full">
            <p class="mx-3 mt-1">-</p>
            <x-input id="line" class="block w-full mt-1 text-center" type="text" name="phone[line]" value="{{ $line }}"
                placeholder="0000" />
        </div>
    </div>
    @endisset
    @isset($extension)
    <div class="w-1/12 mr-2">
        <x-label for="extension" value="&nbsp;" />
        <div class="inline-flex items-center justify-center w-full">
            <p class="mx-3 mt-1">{{ __('Ext.') }}</p>
            <x-input id="extension" class="block w-full mt-1 text-center" type="text" name="phone[extension]"
                value="{{ $extension }}" placeholder="00" />
        </div>
    </div>
    @endisset
    <div class="w-7/12">&nbsp;</div>
</div>
