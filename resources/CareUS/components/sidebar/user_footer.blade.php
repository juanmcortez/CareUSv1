<footer
    class="flex flex-col items-center justify-end w-1/3 px-6 py-6 border-t md:flex-row md:py-9 md:px-0 md:justify-center md:w-full text-dark-400 border-secondary-800 md:sticky md:bottom-0 md:left-0">
    <p class="flex flex-col items-center justify-center text-xs md:mr-4">
        {{ __("Last login: :date", ['date' => auth()->user()->last_login_at]) }}
    </p>
    <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center justify-center mt-3 md:mt-0">
        @csrf
        <a class="text-xs duration-150 ease-in-out transform text-primary-400 hover:text-primary-500"
            href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="mr-1 fa fa-sign-out-alt"></i>{{ __('Log Out') }}
        </a>
    </form>
</footer>
