<x-app-layout>
    <script>
        function getAddress(id) {
            axios.get("/list-address/" + id)
                .then( (res) => {
                    addressList = res.data;
                    generateDivs();
                }) // Logs result object
                .catch(err => console.log(err)) // Logs error
        }

        let addressList;

        function generateDivs() {
            let itemContainer = document.getElementById('entry-content');

            itemContainer.replaceChildren();
            addressList.forEach(function (item) {
                let tableRow = document.createElement('tr');
                let address = document.createElement('td');

                let rowClasses = ['bg-white','border-b','dark:bg-gray-800','dark:border-gray-700','hover:bg-gray-50', 'dark:hover:bg-gray-600'];
                rowClasses.forEach(function (item) {
                    tableRow.classList.add(item);
                })

                address.className = 'addresses';

                let tdClasses = ['px-6','py-4','text-base','text-black'];
                tdClasses.forEach(function (item) {
                    address.classList.add(item);
                })

                address.innerHTML = item.title;
                itemContainer.appendChild(tableRow).appendChild(address);
            });
        }
    </script>

    <div style="display: flex; flex-direction: row; justify-content: center">
        <div style="border: solid black; padding: 2em; width: 50%">
            <table class="table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th class="px-6 py-3">Client</th>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-1 text-base text-black" style="display: flex; align-items: center">
                            {{ $client->name }}
                                <input hidden value="{{ $client->id }}">
                                <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                                    style="margin-left: auto; margin-right: 1em"
                                    onclick="getAddress({{ $client->id }})">
                                Show Addresses
                                </button>
                            <a type="button" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900"
                                    href="/client-deliveries/{{ $client->id }}">Open Addresses
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $clients->links() }}
        </div>
        <div style="border: solid black; padding: 2em; width: 50%">
            <table class="table-striped w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th class="px-6 py-3">
                        Addresses
                    </th>
                </thead>
                <tbody id="entry-content">

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
