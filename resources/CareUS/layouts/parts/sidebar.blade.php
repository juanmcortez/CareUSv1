<button @click.prevent="open = (open === 'false') ? 'true' : 'false'"
    :class="(open === 'false') ? '-ml-6 left-0' : '-ml-6 left-0'"
    class="z-10 flex-col items-center justify-center hidden w-10 h-10 rounded-full md:sticky md:flex focus:outline-none focus:ring-0 top-16 bg-secondary-900 text-light-500">
    <i :class="(open === 'false') ? 'fa-angle-left mr-1' : 'fa-angle-right'" class="text-2xl fa "></i>
</button>

<div :class="(open === 'false') ? 'md:hidden' : ''"
    class="z-0 flex flex-col items-start justify-between w-full min-h-full md:absolute">
    <div class="flex flex-row flex-grow w-full md:flex-col">

        <header class="flex items-center justify-center w-1/3 border-t md:border-t-0 border-secondary-800 md:w-full">
            SIDEBAR HEADER
        </header>

        <main class="flex items-center justify-center w-2/3 border-t border-secondary-800 md:flex-grow md:w-full">
            SIDEBAR CONTENT
        </main>

    </div>

    <footer class="items-center justify-center hidden w-full border-t border-secondary-800 md:flex">
        SIDEBAR FOOTER
    </footer>

</div>
