<x-careus-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    <x-slot name="subheader">
        <h2
            class="flex flex-col items-start justify-center order-2 w-full px-6 mt-3 text-xl font-semibold leading-loose border-t md:px-0 md:mt-0 md:w-1/2 md:ml-12 md:text-2xl md:flex-row md:order-1 border-dark-50 md:border-t-0 md:items-center md:justify-start">
            {{ $title }}
        </h2>
        <div
            class="flex flex-col items-start justify-center order-1 w-full md:px-6 md:pr-12 md:w-1/2 md:justify-center md:items-center md:flex-row md:order-2">
            <ul
                class="flex flex-row items-center justify-around w-full text-xs font-medium md:justify-end text-primary-300">
                <li>
                    <a href="{{ route('patient.show', ['patient' => $patient->patID]) }}" title="{{ __('Go Back') }}"
                        class="flex items-center justify-center w-10 h-10 ml-4 text-red-100 transition-colors duration-150 ease-in-out bg-red-400 rounded-full shadow cursor-pointer hover:bg-red-100 hover:text-red-400">
                        <i class="text-xl fas fa-angle-left"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.edit', ['patient' => $patient->patID]) }}" title="{{ __('Edit') }}"
                        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-primary-400 text-primary-900 hover:bg-primary-900 hover:text-primary-400 disabled">
                        <i class="text-sm fas fa-user-edit"></i>
                    </a>
                </li>
                <li class="mr-4">
                    <div
                        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow bg-dark-100 text-dark-200">
                        <i class="text-sm fas fa-trash-alt"></i>
                    </div>
                </li>
                <li class="mr-4">
                    {!! __('<strong>Created on:</strong> :date', ['date' => $patient->created_at]) !!}</li>
                <li>
                    {!! __('<strong>Last updated on:</strong> :date', ['date' => $patient->persona->updated_at]) !!}
                </li>
                <x-menu.submenu verified="{{ auth()->user()->email_verified_at }}" />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="flex flex-row w-full p-6 md:px-12 text-cemter">

        <div class="w-3/12 mt-10 mr-5">
            <x-patient.minidetails :patient="$patient" />
        </div>
        <div class="w-9/12 mt-10">
            <div class="flex flex-wrap">
                <div class="w-full p-6 bg-brand-50">
                    <h2 class="text-xl font-semibold text-dark-300">{{ __('Patient') }}</h2>
                    {{ $patient }}<br /><br />
                    {{ $patient->persona }}<br /><br />
                    {{ $patient->persona->demographic }}<br /><br />
                    {{ $patient->persona->address }}<br /><br />
                    @foreach ($patient->persona->phone as $phone )
                    {{ $phone }}<br />
                    @endforeach
                    <br />
                    <h2 class="mb-5 text-xl font-semibold text-dark-300">{{ __('Contacts') }}</h2>
                    <hr class="my-5 border-dark-200" />
                    @foreach ($patient->contact as $contact )
                    {{ $contact }}<br /><br />
                    {{ $contact->phone->first() }}
                    <hr class="my-5 border-dark-200" />
                    @endforeach
                    <h2 class="mb-5 text-xl font-semibold text-dark-300">{{ __('Employer') }}</h2>
                    {{ $patient->employer }}<br /><br />
                    {{ $patient->employer->demographic }}<br /><br />
                    {{ $patient->employer->address }}<br /><br />
                    {{ $patient->employer->phone->first() }}<br /><br />
                    <h2 class="mb-5 text-xl font-semibold text-dark-300">{{ __('Subscriber') }}</h2>
                    <hr class="my-5 border-dark-200" />
                    @foreach ($patient->subscriber as $subscriber )
                    {{ $subscriber }}<br /><br />
                    {{ $subscriber->address }}<br /><br />
                    {{ $subscriber->phone->first() }}
                    <hr class="my-5 border-dark-200" />
                    @endforeach
                </div>
            </div>
        </div>



    </div>
    {{-- Page content --}}
</x-careus-layout>
