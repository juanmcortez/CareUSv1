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
                    <a href="{{ route('patient.detail', ['patient' => $patient_details['patID']]) }}"
                        title="{{ __('Demographic Details') }}"
                        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-secondary-400 text-light-400 hover:bg-secondary-900 hover:text-light-100">
                        <i class="text-sm fas fa-info-circle"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.edit', ['patient' => $patient_details['patID']]) }}"
                        title="{{ __('Edit') }}"
                        class="flex items-center justify-center w-10 h-10 ml-4 transition-colors duration-150 ease-in-out rounded-full shadow cursor-pointer bg-primary-400 text-primary-900 hover:bg-primary-900 hover:text-primary-400">
                        <i class="text-sm fas fa-user-edit"></i>
                    </a>
                </li>
                <li class="mr-4">
                    <form method="POST"
                        action="{{ route('patient.delete', ['patient' => $patient_details['patID']]) }}">
                        @csrf
                        @method('DELETE')
                        <x-button title="{{ __('Delete this Patient') }}"
                            class="flex items-center justify-center w-10 h-10 ml-4 text-red-900 transition-colors duration-150 ease-in-out bg-red-400 rounded-full shadow cursor-pointer hover:bg-red-900 hover:text-red-400">
                            <i class="text-sm fas fa-trash-alt"></i>
                        </x-button>
                    </form>
                </li>
                <li class="mr-4">{!! __('<strong>Created on:</strong> :date', ['date' =>
                    $patient_details['created_at']]) !!}</li>
                <li>
                    {!! __('<strong>Last updated on:</strong> :date', ['date' => $patient_details['updated_at']]) !!}
                </li>
                <x-menu.submenu verified="{{ auth()->user()->email_verified_at }}" />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="flex flex-row w-full p-6 md:px-12 text-cemter">

        <div class="w-3/12 mt-10 mr-5">
            <div class="flex flex-wrap">
                <div class="w-full py-6 text-sm text-center bg-brand-50">
                    @empty($patient_details['profile_photo'])
                    <i class="flex-shrink-0 object-cover object-center mx-auto -mt-16 rounded-full shadow-xl text-8xl aboslute fas fa-user-circle text-primary-700"
                        title="{{ $patient_details['formated_name'] }}"></i>
                    @else
                    <img class="flex-shrink-0 object-cover object-center w-24 h-24 mx-auto -mt-16 border-4 rounded-full shadow-xl aboslute border-primary-500"
                        alt="{{ $patient_details['formated_name'] }}"
                        src="{{ secure_asset($patient_details['profile_photo']) }}" />
                    @endempty

                    <div class="flex flex-row flex-wrap w-full pt-4 mt-5 text-left">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Patient ID') }}</div>
                        <div class="w-7/12">{{ $patient_details['patID'] }}</div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('External ID') }}</div>
                        <div class="w-7/12">{{ $patient_details['externalID'] }}</div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Insurance') }}</div>
                        <div class="w-7/12">{{-- $patient_details['subscriber'] --}}</div>

                        <div class="w-5/12 pr-2 mt-1 font-semibold text-right">&nbsp;</div>
                        <div class="w-7/12 mt-1">{!! $patient_details['subscphone'] !!}</div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Birthdate') }}</div>
                        <div class="w-7/12">{{ $patient_details['birthdate'] }}</div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Social Security') }}</div>
                        <div class="w-7/12">{{ $patient_details['social_security'] }}</div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Address') }}</div>
                        <div class="w-7/12">
                            {{ $patient_details['address']['street'] . ' ' . $patient_details['address']['street_extended'] }}
                        </div>
                        <div class="w-5/12 pr-2 mt-1 font-semibold text-right">&nbsp;</div>
                        <div class="w-7/12 mt-1">
                            {{ $patient_details['address']['city'] . ', ' . $patient_details['address']['state'] . ' ' . $patient_details['address']['zip'] }}
                        </div>
                    </div>
                    <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
                        <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Phone') }}</div>
                        <div class="w-7/12">{!! $patient_details['phone'] !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-9/12 mt-10">
            <div class="flex flex-wrap">
                <div class="w-full p-6 bg-brand-50">
                </div>
            </div>
        </div>



    </div>
    {{-- Page content --}}
</x-careus-layout>
