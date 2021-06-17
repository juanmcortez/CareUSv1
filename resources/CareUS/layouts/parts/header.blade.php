<header class="flex flex-col w-full border-b">
    <div class="flex flex-col items-center justify-between w-full md:flex-row">
        <div class="flex items-center justify-center w-full md:w-1/4">
            {{ config('app.name') }}
        </div>
        <nav class="flex items-center justify-center w-full md:w-3/4">
            <ul class="flex flex-col items-center justify-around w-full md:flex-row">
                <li>HEADER ITEM</li>
                <li>HEADER ITEM</li>
            </ul>
            <ul class="flex flex-col items-center justify-around w-full md:flex-row">
                <li>HEADER ITEM</li>
                <li>HEADER ITEM</li>
            </ul>
            <ul class="flex flex-col items-center justify-around w-full md:flex-row">
                <li>HEADER ITEM</li>
                <li>HEADER ITEM</li>
            </ul>
            {{ $header }}
        </nav>
    </div>
    <nav class="flex flex-row items-center justify-center w-full border-t">
        <ul class="flex flex-col items-center justify-around w-1/2 md:flex-row">
            <li>SUBHEADER ITEM</li>
            <li>SUBHEADER ITEM</li>
        </ul>
        <ul class="flex flex-col items-center justify-around w-1/2 md:flex-row">
            <li>SUBHEADER ITEM</li>
            <li>SUBHEADER ITEM</li>
        </ul>
        <ul class="flex flex-col items-center justify-around w-1/2 md:flex-row">
            <li>SUBHEADER ITEM</li>
            <li>SUBHEADER ITEM</li>
        </ul>
        <ul class="flex flex-col items-center justify-around w-1/2 md:flex-row">
            <li>SUBHEADER ITEM</li>
            <li>SUBHEADER ITEM</li>
        </ul>
        {{ $subheader }}
    </nav>
</header>
