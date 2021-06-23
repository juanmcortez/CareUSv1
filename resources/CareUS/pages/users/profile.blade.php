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
        <form method="POST" action="{{  route('users.profile.update') }}" class="flex flex-col flex-wrap w-full">
            @csrf
            @method('PUT')

            <div class="flex flex-row items-center justify-between w-full">
                <div class="w-3/12 mr-2">
                    <x-label for="username" :value="__('Username')" />
                    <x-input id="username" class="block w-full mt-1" type="text" name="user[username]"
                        :value="auth()->user()->username" placeholder="{{ __('Username') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="email" :value="__('E-mail')" />
                    <x-input id="email" class="block w-full mt-1" type="text" name="user[email]"
                        :value="auth()->user()->email" placeholder="{{ __('E-mail') }}" />
                </div>
                <div class="w-6/12">&nbsp;</div>
            </div>

            <div class="flex flex-row items-center justify-between w-full mt-10">
                <div class="w-3/12 mr-2">
                    <x-label for="last_name" :value="__('Name')" />
                    <x-input id="last_name" class="block w-full mt-1" type="text" name="user[persona][last_name]"
                        :value="auth()->user()->persona->last_name" placeholder="{{ __('Last') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="first_name" value="&nbsp;" />
                    <x-input id="first_name" class="block w-full mt-1" type="text" name="user[persona][first_name]"
                        :value="auth()->user()->persona->first_name" placeholder="{{ __('First') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="middle_name" value="&nbsp;" />
                    <x-input id="middle_name" class="block w-full mt-1" type="text" name="user[persona][middle_name]"
                        :value="auth()->user()->persona->middle_name" placeholder="{{ __('Middle') }}" />
                </div>
                <div class="w-3/12">&nbsp;</div>
            </div>

            <div class="flex flex-row items-center justify-between w-full mt-4">
                <div class="w-3/12 mr-2">
                    <x-label for="birthdate" :value="__('Birthdate')" />
                    <x-input id="birthdate" class="block w-full mt-1" type="text" name="user[persona][birthdate]"
                        :value="auth()->user()->persona->birthdate->format('m-d-Y')" />
                </div>
                <div class="w-9/12">&nbsp;</div>
            </div>

            <div class="flex flex-row items-center justify-start w-full mt-10">
                <div class="w-1/12 mr-2">
                    <x-label for="plussign" :value="__('Phone')" />
                    <div class="inline-flex items-center justify-center w-full">
                        <p class="mx-3 mt-1">+</p>
                        <x-input id="intl_code" class="block w-full mt-1 text-center" type="text"
                            name="user[persona][phone][intl_code]"
                            :value="auth()->user()->persona->phone->first()->intl_code" placeholder="1" />
                    </div>
                </div>
                <div class="w-1/12 mr-2">
                    <x-label for="area_code" value="&nbsp;" />
                    <div class="inline-flex items-center justify-center w-full">
                        <p class="mx-3 mt-1">(</p>
                        <x-input id="area_code" class="block w-full mt-1 text-center" type="text"
                            name="user[persona][phone][area_code]"
                            :value="auth()->user()->persona->phone->first()->area_code" placeholder="000" />
                        <p class="mx-3 mt-1">)</p>
                    </div>
                </div>
                <div class="w-1/12 mr-2">
                    <x-label for="prefix" value="&nbsp;" />
                    <div class="inline-flex items-center justify-center w-full">
                        <x-input id="prefix" class="block w-full mt-1 text-center" type="text"
                            name="user[persona][phone][prefix]" :value="auth()->user()->persona->phone->first()->prefix"
                            placeholder="000" />
                    </div>
                </div>
                <div class="w-1/12 mr-2">
                    <x-label for="line" value="&nbsp;" />
                    <div class="inline-flex items-center justify-center w-full">
                        <p class="mx-3 mt-1">-</p>
                        <x-input id="line" class="block w-full mt-1 text-center" type="text"
                            name="user[persona][phone][line]" :value="auth()->user()->persona->phone->first()->line"
                            placeholder="0000" />
                    </div>
                </div>
                <div class="w-1/12 mr-2">
                    <x-label for="extension" value="&nbsp;" />
                    <div class="inline-flex items-center justify-center w-full">
                        <p class="mx-3 mt-1">{{ __('Ext.') }}</p>
                        <x-input id="extension" class="block w-full mt-1 text-center" type="text"
                            name="user[persona][phone][extension]"
                            :value="auth()->user()->persona->phone->first()->extension" placeholder="00" />
                    </div>
                </div>
                <div class="w-7/12">&nbsp;</div>
            </div>

            <div class="flex flex-row items-center justify-between w-full mt-10">
                <div class="w-3/12 mr-2">
                    <x-label for="street" :value="__('Address')" />
                    <x-input id="street" class="block w-full mt-1" type="text" name="user[persona][address][street]"
                        :value="auth()->user()->persona->address->street" placeholder="{{ __('Street') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="street_extended" value="&nbsp;" />
                    <x-input id="street_extended" class="block w-full mt-1" type="text"
                        name="user[persona][address][street_extended]"
                        :value="auth()->user()->persona->address->street_extended" placeholder="{{ __('Extended') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="city" value="&nbsp;" />
                    <x-input id="city" class="block w-full mt-1" type="text" name="user[persona][address][city]"
                        :value="auth()->user()->persona->address->city" placeholder="{{ __('City') }}" />
                </div>
                <div class="w-3/12">&nbsp;</div>
            </div>
            <div class="flex flex-row items-center justify-between w-full mt-2">
                <div class="w-3/12 mr-2">
                    <x-input id="state" class="block w-full mt-2" type="text" name="user[persona][address][state]"
                        :value="auth()->user()->persona->address->state" placeholder="{{ __('State') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-input id="zip" class="block w-full mt-2" type="text" name="user[persona][address][zip]"
                        :value="auth()->user()->persona->address->zip" placeholder="{{ __('Postal Code') }}" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-input id="country" class="block w-full mt-2" type="text" name="user[persona][address][country]"
                        :value="auth()->user()->persona->address->country" placeholder="{{ __('Country') }}" />
                </div>
                <div class="w-3/12">&nbsp;</div>
            </div>

            <div class="flex flex-row items-center justify-between w-full mt-10">
                <div class="w-3/12 mr-2">
                    <x-label for="username"
                        :value="__('<strong>Created on:</strong> :date', ['date' => auth()->user()->created_at])" />
                </div>
                <div class="w-3/12 mr-2">
                    <x-label for="username"
                        :value="__('<strong>Updated on:</strong> :date', ['date' => auth()->user()->persona->updated_at])" />
                </div>
                <div class="w-4/12">&nbsp;</div>
                <div class="flex flex-row items-center justify-around w-2/12">
                    <x-button class="bg-green-500 hover:bg-green-700">
                        <i class="mr-1 fa fa-save"></i>{{ __('Update') }}
                    </x-button>
                    <x-button class="bg-red-500 hover:bg-red-700">
                        <i class="mr-1 fa fa-times"></i>{{ __('Cancel') }}
                    </x-button>
                </div>
            </div>

        </form>
    </div>
    {{-- Page content --}}
</x-careus-layout>
