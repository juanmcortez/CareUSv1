<button @click.prevent="open = (open === 'false') ? 'true' : 'false'"
    :class="(open === 'false') ? '-ml-6 left-0' : '-ml-6 left-0'"
    class="left-0 z-10 flex-col items-center justify-center hidden w-10 h-10 -ml-6 rounded-full md:sticky md:flex focus:outline-none focus:ring-0 top-16 bg-secondary-900 text-light-500">
    <i :class="(open === 'false') ? 'fa-angle-left mr-1' : 'fa-angle-right'" class="mr-1 text-2xl fa fa-angle-left"></i>
</button>

<div :class="(open === 'false') ? 'md:hidden' : ''"
    class="z-0 flex flex-row items-start justify-between w-full h-screen md:flex-col md:absolute">
    <div class="flex flex-row flex-grow w-2/3 md:w-full md:flex-col">

        <header
            class="flex flex-col items-center justify-start w-full px-6 py-6 md:px-0 md:items-center md:justify-between md:flex-grow">

            <x-sidebar.user_info />

        </header>

        <main
            class="flex flex-col items-center justify-start w-full px-6 pt-6 md:px-0 md:items-center md:justify-between md:flex-grow">

            <x-sidebar.user_notes />

            <x-sidebar.user_menu />

        </main>

    </div>

    <x-sidebar.user_footer />

</div>
