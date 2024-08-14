<div>
    <header class="w-full h-16 bg-white border-b p-3 px-4 space-x-2 sm:space-x-8 flex items-center justify-between">
        <p class="text-sm font-bold text-green-400 sm:text-xl ">Lara-Shop</p>
        <form class="flex items-center flex-grow mt-2 sm:mt-0 w-full sm:w-auto">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="flex-grow">
                <input type="text" id="voice-search"
                    class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5"
                    placeholder="Search" required />
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-green-500 rounded-lg border border-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>Search
            </button>
        </form>
        <h1 class="text-sm sm:text-lg font-semibold uppercase text-gray-500 mt-2 sm:mt-0"><?= Auth::user()->name ?></h1>
    </header>
</div>
<div class="p-8">
    @yield('content')
</div>
