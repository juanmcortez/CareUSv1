<div class="flex flex-row flex-wrap items-center justify-center w-full md:flex-col md:items-center md:justify-start">
    @if(auth()->user()->persona->profile_photo)
    <img alt="@empty(auth()->user()->persona->last_name) {{ auth()->user()->email }} @else {{ auth()->user()->persona->formated_name }} @endempty"
        src="{{ secure_asset(auth()->user()->persona->profile_photo) }}"
        class="mx-auto mb-5 border-4 rounded-full h-28 w-28 border-primary-400" />
    @else
    <div
        class="mx-auto mb-5 text-center border-4 rounded-full h-28 w-28 text-primary-400 bg-primary-200 border-primary-400">
        <i class="mt-1 text-8xl fa fa-user-circle"></i>
    </div>
    @endif

    <h3 class="mb-2 text-xl font-semibold">
        @empty(auth()->user()->persona->last_name)
        {{ auth()->user()->email }}
        @else
        {{ auth()->user()->persona->formated_name }}
        @endempty
    </h3>

    <div class="flex flex-row items-center justify-center w-full text-sm text-center text-primary-400">
        <h5 class="w-full" title="{{ __('User role') }}">
            <i class="mt-1 mr-1 fas fa-id-badge"></i>
            {{ __('Administrator') }}
        </h5>
    </div>
</div>
