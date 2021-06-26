<div class="flex flex-row items-center justify-between w-full mt-10">
    <div class="w-3/12">&nbsp;</div>
    @isset($created)
    <div class="w-3/12 mr-2">
        <label class="block text-sm font-medium text-center text-primary-500">
            {!! __('<strong>Created on:</strong> :date', ['date' => auth()->user()->created_at]) !!}
        </label>
    </div>
    @endisset
    @isset($updated)
    <div class="w-3/12 mr-2">
        <label class="block text-sm font-medium text-center text-primary-500">
            {!! __('<strong>Updated on:</strong> :date', ['date' => auth()->user()->persona->updated_at]) !!}
        </label>
    </div>
    @endisset
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
