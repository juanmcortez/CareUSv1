@props([
'patient' => ''
])
<div class="flex flex-wrap">
    <div class="w-full py-6 text-sm text-center bg-brand-50">
        @empty($patient->persona->profile_photo)
        <i class="flex-shrink-0 object-cover object-center mx-auto -mt-16 rounded-full shadow-xl text-8xl fas fa-user-circle text-primary-400 bg-primary-200"
            title="{{ $patient->formated_name }}"></i>
        @else
        <img class="flex-shrink-0 object-cover object-center w-24 h-24 mx-auto -mt-16 border-4 rounded-full shadow-xl border-primary-500"
            alt="{{ $patient->formated_name }}" src="{{ secure_asset($patient->persona->profile_photo) }}" />
        @endempty

        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Patient ID') }}</div>
            <div class="w-7/12">{{ $patient->patID }}</div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('External ID') }}</div>
            <div class="w-7/12">{{ $patient->externalID }}</div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Insurance') }}</div>
            <div class="w-7/12">
                {{ $patient->subscriber->whereIn('subscriber_level', ['primary', 'secondary'])->first()->insurance->name }}
            </div>

            <div class="w-5/12 pr-2 mt-1 font-semibold text-right">&nbsp;</div>
            <div class="w-7/12 mt-1">
                {{ $patient->subscriber->whereIn('subscriber_level', ['primary', 'secondary'])->first()->insurance->phone->formated_phone }}
            </div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Birthdate') }}</div>
            <div class="w-7/12">
                {{ $patient->persona->birthdate }} - <strong>{{ $patient->persona->current_age }}</strong>
            </div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Social Security') }}</div>
            <div class="w-7/12">{{ $patient->persona->social_security }}</div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Address') }}</div>
            <div class="w-7/12">
                {{ $patient->persona->address->street . ' ' . $patient->persona->address->street_extended }}
            </div>
            <div class="w-5/12 pr-2 mt-1 font-semibold text-right">&nbsp;</div>
            <div class="w-7/12 mt-1">
                {{ $patient->persona->address->city . ', ' . $patient->persona->address->state . ' ' . $patient->persona->address->zip }}
            </div>
        </div>
        <div class="flex flex-row flex-wrap w-full pt-4 mt-4 text-left border-t border-dark-100">
            <div class="w-5/12 pr-2 font-semibold text-right">{{ __('Phone') }}</div>
            <div class="w-7/12">
                {{ $patient->persona->phone->first()->formated_phone }}
            </div>
        </div>
    </div>
</div>
