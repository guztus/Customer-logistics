<nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container center flex flex-wrap items-center justify-start">
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex center flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <x-nav-link :href="route('client-list')" :active="request()->routeIs('client-list')" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Client List
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('delivery-types')" :active="request()->routeIs('delivery-types')" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Delivery Types
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('latest-deliveries')" :active="request()->routeIs('latest-deliveries')" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Latest Orders
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('inactive-clients')" :active="request()->routeIs('inactive-clients')" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Inactive Clients
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>

