<x-app-layout>
    <div style="display: flex; justify-content: center; align-items: flex-start">
        <div class="container">
            <div>klienti, kuriem nekad netika piegādāta šķidrā prece (type 1), delivery type 2</div>
            <table class="table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th class="px-6 py-3">Client</th>
                <th class="px-6 py-3">Address</th>
                </thead>
                <tbody>
                @foreach($deliveries as $delivery)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->name }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->title }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="my-4">{{ $deliveries->links() }}</div>
        </div>
    </div>
</x-app-layout>
