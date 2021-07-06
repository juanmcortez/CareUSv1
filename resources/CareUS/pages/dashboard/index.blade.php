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
                <x-menu.submenu verified="{{ auth()->user()->email_verified_at }}" />
            </ul>
        </div>
    </x-slot>
    {{-- Default blocks --}}

    {{-- Page content --}}
    <div class="flex flex-col flex-wrap w-full p-6 md:px-12 text-cemter">

        <div class="flex flex-row items-center justify-end w-full pr-5 text-xs text-dark-300">
            {{ __('Last statistics update: :date', [ 'date' => $stats->updated_at]) }}
        </div>

        <div class="flex flex-row flex-wrap">
            <div class="flex w-4/12">
                <div id="patientsevolution" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="patientsgender" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="patientsagegroups" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
        </div>

        <div class="flex flex-row flex-wrap">
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
        </div>

        <div class="flex flex-row flex-wrap">
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
            <div class="flex w-4/12">
                <div id="" class="flex w-full p-5 m-5 bg-dark-50"></div>
            </div>
        </div>

    </div>
    {{-- Page content --}}

    @push('scripts')
    <script type="text/javascript">
        // Patients Evolution
        var patientsevolutionoptions = {
            chart: {
                fontFamily: 'Poppins',
                foreColor: '#293241',
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false,
                },
            },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                enabled: true,
                position: 'top',
                offsetY: -13,
                style: {
                    fontSize: '11px',
                }
            },
            noData: {
                text: '{{ __('No data available.') }}',
            },
            series: [{
                type: 'bar',
                name: 'New Patients',
                data: [
                    @foreach ($stats->patientsevolY as $value)
                    {{ $value }}
                    {{ $loop->last ? '' : ', ' }}
                    @endforeach
                ]
            },
            {
                type: 'bar',
                name: 'Total Patients',
                data: [
                    @php $current = $stats->patsevolXInit; @endphp
                    @foreach ($stats->patientsevolY as $value)
                    {{ $current += $value }}
                    {{ $loop->last ? '' : ', ' }}
                    @endforeach
                ]
            }],
            yaxis: {
                type: 'numeric',
            },
            xaxis: {
                type: 'datetime',
                categories: [
                    @foreach ($stats->patientsevolX as $value)
                    '{{ $value }}'
                    {{ $loop->last ? '' : ', ' }}
                    @endforeach
                ]
            }
        };

        // Patient Genders
        var patientsgenderoptions = {
            chart: {
                fontFamily: 'Poppins',
                foreColor: '#293241',
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false,
                },
                type:'donut',
            },
            tooltip: {
                enabled: false,
            },
            noData: {
                text: '{{ __('No data available.') }}',
            },
            labels: ['{{ __('Male') }}', '{{ __('Female') }}', '{{ __('Non-Binary') }}', '{{ __('Transgender') }}', '{{ __('Genderfluid') }}', '{{ __('Intersex') }}', '{{ __('Undisclosed') }}', '{{ __('Others') }}'],
            series: [{{ implode(', ', $stats->patientgender) }}]
        };

        // Patient Age Groups
        var patientsagegroupsoptions = {
            chart: {
                fontFamily: 'Poppins',
                foreColor: '#293241',
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false,
                },
                type:'bar',
            },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                enabled: true,
                position: 'top',
                offsetY: -13,
                style: {
                    fontSize: '11px',
                }
            },
            noData: {
                text: '{{ __('No data available.') }}',
            },
            series: [{
                type: 'bar',
                name: 'Patients Ages',
                data: [{{ implode(', ', $stats->patientsagegY) }}]
            }],
            yaxis: {
                type: 'numeric',
            },
            xaxis: {
                categories: ['0-10', '11-20', '21-30','31-40','41-50','51-60','61-70','71-80','81-90','+91']
            }
        }
    </script>
    @endpush
</x-careus-layout>
