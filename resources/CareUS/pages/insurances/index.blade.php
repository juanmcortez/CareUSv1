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
                <x-menu.submenu verified="{{ auth()->user()->email_verified_at }}" :csv="$insurances" />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="w-full p-6 md:px-12 text-cemter">
        <table class="w-full">
            <tbody>
                @foreach ($insurances as $insurance)
                <tr class="text-center">
                    <td class="text-left">{{ $insurance->name }}</td>
                    <td>{{ $insurance->contract_effective_date }}</td>
                    <td>{{ $insurance->payer_id }}</td>
                    <td>{{ $insurance->phone->formated_phone }}</td>
                    <td class="text-left">
                        {{ $insurance->address->street.' '.$insurance->address->street_extended }}
                    </td>
                    <td class="text-left">
                        {{ $insurance->address->city.', '.$insurance->address->state.' '.$insurance->address->zip }}
                    </td>
                </tr>
                <tr>
                    <td colspan="6">&nbsp;</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $insurances->links() }}
    </div>
    {{-- Page content --}}
</x-careus-layout>
