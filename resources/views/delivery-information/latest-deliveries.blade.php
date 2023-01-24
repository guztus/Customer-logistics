<x-app-layout>
    <div style="display: flex; justify-content: center; align-items: flex-start">
        <div class="container py-4">
            <table class="table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th class="px-6 py-3">Client</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Item</th>
                    <th class="px-6 py-3">Price</th>
                </thead>
                <tbody>
                @foreach ($deliveries as $delivery)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->name }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->title }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->item }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->QTY * $delivery->price }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="my-4">{{ $deliveries->links() }}</div>
        </div>
    </div>
</x-app-layout>
