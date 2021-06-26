<div
    class="flex flex-row items-center justify-around w-full border-t text-primary-500 border-primary-300 bg-primary-200">

    <ul class="flex flex-row items-center justify-center w-full py-3 md:flex-row">
        <li class="px-6">
            <a href="{{ route('dashboard.index') }}"
                class="transition-colors duration-150 ease-in-out hover:text-primary-800">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="px-6">
            <a href="{{ route('dashboard.index') }}"
                class="transition-colors duration-150 ease-in-out hover:text-primary-800">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="px-6">
            <a href="{{ route('dashboard.index') }}"
                class="transition-colors duration-150 ease-in-out hover:text-primary-800">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <li class="px-6">
            <a href="{{ route('dashboard.index') }}"
                class="transition-colors duration-150 ease-in-out hover:text-primary-800">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>
        <li class="pl-6 pr-2">
            <i class="fa fa-copyright"></i>
        </li>
        <li class="pr-6">
            {{ date('Y') }}
        </li>
    </ul>

</div>
