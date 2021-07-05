<x-careus-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    <x-slot name="subheader">
        <h2
            class="flex flex-col items-start justify-center order-2 w-full px-6 mt-3 text-xl font-semibold leading-loose border-t md:px-0 md:mt-0 md:w-1/2 md:ml-12 md:text-2xl md:flex-row md:order-1 border-dark-50 md:border-t-0 md:items-center md:justify-start">
            @empty($patient->persona->profile_photo)
            <i class="mx-4 text-4xl fas fa-user-circle text-primary-700"
                title="{{ $patient->persona->formated_name }}"></i>
            @else
            <img class="w-10 h-10 mx-4 border-2 rounded-full border-primary-500"
                alt="{{ $patient->persona->formated_name }}"
                src="{{ secure_asset($patient->persona->profile_photo) }}" />
            @endempty
            {{ $title }}
        </h2>
        <div
            class="flex flex-col items-start justify-center order-1 w-full md:px-6 md:pr-12 md:w-1/2 md:justify-center md:items-center md:flex-row md:order-2">
            <ul
                class="flex flex-row items-center justify-around w-full text-xs font-medium md:justify-end text-primary-300">
                <li class="mr-4">{!! __('<strong>Created on:</strong> :date', ['date' => $patient->created_at]) !!}</li>
                <li>
                    {!! __('<strong>Last updated on:</strong> :date', ['date' => $patient->persona->updated_at]) !!}
                </li>
                <x-menu.submenu verified="{{ auth()->user()->email_verified_at }}" />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="w-full p-6 md:px-12 text-cemter">
        {{ $patient }}<br /><br />
        {{ $patient->persona }}<br /><br />
        {{ $patient->persona->demographic }}<br /><br />
        {{ $patient->persona->address }}<br /><br />
        {{ $patient->persona->phone }}
    </div>
    {{-- Page content --}}
</x-careus-layout>
