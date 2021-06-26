<x-careus-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="description">{{ $description }}</x-slot>
    <x-slot name="subheader">
        <h2
            class="flex flex-col items-start justify-center order-2 w-full px-6 mt-3 text-xl font-semibold leading-loose border-t md:px-0 md:mt-0 md:w-1/2 md:ml-12 md:text-2xl md:flex-row md:order-1 border-dark-50 md:border-t-0 md:items-center md:justify-start">
            {{ $title }}
        </h2>
        <div
            class="flex flex-col items-start justify-center order-1 w-full md:px-6 md:pr-12 md:w-1/2 md:justify-center md:items-center md:flex-row md:order-2">
            <ul class="flex flex-row items-center justify-around w-full md:items-end md:justify-between">
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="w-full p-6 md:px-12 text-cemter">
        <form method="POST" action="{{  route('users.profile.update') }}" enctype="multipart/form-data"
            class="flex flex-col flex-wrap w-full">
            @csrf
            @method('PUT')

            <x-user.usermail username="{{ auth()->user()->username }}" email="{{ auth()->user()->email }}" />

            <x-persona.name last_name="{{ auth()->user()->persona->last_name }}"
                first_name="{{ auth()->user()->persona->first_name }}"
                middle_name="{{ auth()->user()->persona->middle_name }}" />

            <x-user.doblang language="{{ auth()->user()->persona->language }}" :language_options="$lists['languages']"
                profile_photo="{{ auth()->user()->persona->profile_photo }}"
                full_name="{{ auth()->user()->persona->formated_name }}"
                month="{{ date('m', strtotime(auth()->user()->persona->birthdate)) }}" :month_options="$lists['months']"
                day="{{ date('d', strtotime(auth()->user()->persona->birthdate)) }}" :day_options="$lists['days']"
                year="{{ date('Y', strtotime(auth()->user()->persona->birthdate)) }}" :year_options="$lists['years']" />

            <x-user.phone intl_code="{{ auth()->user()->persona->phone->first()->intl_code }}"
                area_code="{{ auth()->user()->persona->phone->first()->area_code }}"
                prefix="{{ auth()->user()->persona->phone->first()->prefix }}"
                line="{{ auth()->user()->persona->phone->first()->line }}"
                extension="{{ auth()->user()->persona->phone->first()->extension }}" />

            <x-persona.address street="{{ auth()->user()->persona->address->street }}"
                street_extended="{{ auth()->user()->persona->address->street_extended }}"
                city="{{ auth()->user()->persona->address->city }}"
                state="{{ auth()->user()->persona->address->state }}" :state_options="$lists['states']"
                zip="{{ auth()->user()->persona->address->zip }}"
                country="{{ auth()->user()->persona->address->country }}" :country_options="$lists['countries']" />

            <div class="flex flex-row items-center justify-between w-full mt-10">
                <div class="w-3/12 mr-2">
                    <x-label for="username"
                        :value="__('<strong>Created on:</strong> :date', ['date' => auth()->user()->created_at])" />
                </div>
                <div class="w-3/12">&nbsp;</div>
                <div class="w-4/12 mr-2">
                    <x-label for="username"
                        :value="__('<strong>Updated on:</strong> :date', ['date' => auth()->user()->persona->updated_at])" />
                </div>
                <div class="flex flex-row items-center justify-around w-2/12">
                    <x-button class="bg-green-500 hover:bg-green-700">
                        <i class="mr-1 fa fa-save"></i>{{ __('Update') }}
                    </x-button>
                    <x-button type="button" class="bg-red-500 hover:bg-red-700"
                        onclick="document.location.href='{{ route('dashboard.index') }}';">
                        <i class="mr-1 fa fa-times"></i>{{ __('Cancel') }}
                    </x-button>
                </div>
            </div>

        </form>
    </div>
    {{-- Page content --}}
</x-careus-layout>
