<div class="flex flex-row items-center justify-between w-full mt-10">
    <div class="w-9/12">&nbsp;</div>
    <div class="flex flex-row items-center justify-around w-3/12">
        <x-button class="bg-green-500 hover:bg-green-700">
            <i class="mr-1 fa fa-save"></i>{{ __('Update') }}
        </x-button>
        @isset($cancelRoute)
        <x-button type="button" class="bg-red-500 hover:bg-red-700"
            onclick="document.location.href='{{ $cancelRoute }}';">
            <i class="mr-1 fa fa-times"></i>{{ __('Cancel') }}
        </x-button>
        @endisset
    </div>
</div>
