<button @click.prevent="open = (open === 'false') ? 'true' : 'false'"
    :class="(open === 'false') ? '-ml-6 left-0' : '-ml-6 left-0'"
    class="z-10 flex-col items-center justify-center hidden w-10 h-10 rounded-full md:sticky md:flex focus:outline-none focus:ring-0 top-16 bg-secondary-900 text-light-500">
    <i :class="(open === 'false') ? 'fa-angle-left mr-1' : 'fa-angle-right'" class="text-2xl fa "></i>
</button>

<div :class="(open === 'false') ? 'md:hidden' : ''"
    class="z-0 flex flex-row items-start justify-between w-full min-h-full md:flex-col md:absolute">
    <div class="flex flex-row flex-grow w-2/3 md:w-full md:flex-col">

        <header
            class="items-center justify-center hidden w-full py-6 border-t md:flex md:border-t-0 border-secondary-800">
            SIDEBAR HEADER
        </header>

        <main
            class="flex items-center justify-start w-full px-6 py-6 border-t md:px-0 md:items-start md:justify-center border-secondary-800 md:flex-grow">
            SIDEBAR CONTENT
        </main>

    </div>

    <footer
        class="flex items-center justify-end w-1/3 px-6 py-6 border-t md:px-0 md:justify-center md:w-full border-secondary-800">
        SIDEBAR FOOTER
    </footer>

</div>
