<x-app-layout>
    <div style="display: flex; flex-direction: column; justify-content: center">
        <div style="border: solid 1px black; width: 100%; padding: 15px 15px">
            <b>Name:</b> {{ $client->name }}
            <b>Phone:</b> {{ $client->phone }}
            <b>Email:</b> {{ $client->email }}
        </div>
        <div style="border: solid 1px black;  width: 100%">
            <table class="table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Status</th>
                </thead>
                <tbody>
                @foreach($deliveries as $delivery)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->title }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->date }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->price_sum }}
                        </td>
                        <td class="px-6 py-4 text-base text-black">
                            {{ $delivery->status }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="my-4">{{ $deliveries->links() }}</div>
        </div>
    </div>
</x-app-layout>
