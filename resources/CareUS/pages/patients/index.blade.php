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
                {{-- <li>{{ __('Subheader') }}</li> --}}
                <x-menu.submenu />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="w-full p-6 md:px-12 text-cemter">

        <table class="w-full">
            <tbody>
                @foreach ($personas as $persona)
                <tr>
                    <td class="text-center">
                        @empty($persona->profile_photo)
                        <i class="text-3xl fas fa-user-circle text-primary-700"
                            title="{{ $persona->formated_name }}"></i>
                        @else
                        <img class="w-8 h-8 mx-auto border-2 rounded-full border-primary-500"
                            alt="{{ $persona->formated_name }}" src="{{ secure_asset($persona->profile_photo) }}" />
                        @endempty
                    </td>
                    <td>{{ $persona->formated_name }}</td>
                    <td>{{ $persona->birthdate }}</td>
                    <td>{{ $persona->phone->first()->formated_phone }}</td>
                    <td>{{ $persona->patient->patID }}</td>
                    <td>{{ $persona->patient->externalID }}</td>
                    <td>{{ $persona->patient->patient_level_accession }}</td>
                    <td class="text-center">
                        <a href="{{ route('patients.show', ['patient' => $persona->patient->patID]) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">{{ $personas->links() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    {{-- Page content --}}
</x-careus-layout>
