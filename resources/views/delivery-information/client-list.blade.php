<x-app-layout>
    <script>
        // function dataD() {
        //     return {
        //         dato1: '',
        //         axiosResponse: '',
        //         ok: false,
        //
        //         inviaValoriCheckBox(val, servizio){
        //             axios.get( 'https://reqres.in/api/unknown/2')
        //                 .then( (r)=>{
        //                     console.log(r.data.data);
        //                     this.ok = true;
        //                     this.axiosResponse = r.data.data.name;
        //                     allmydata = r.data.data.name;
        //                     setTimeout(() => {
        //                         this.ok = false;
        //                     }, 5000);
        //
        //                 }).catch( (e)=>{
        //                 console.log(e);
        //             })
        //         },
        //         mounted(){
        //             console.log('mounted');
        //         }
        //     }
        // }

        function getAddress(id) {
            // return {}
            axios.get("/list-address/" + id)
                .then( (res) => {
                    console.log(res.data)
                    allmydata = res.data;
                    users = res.data;
                }) // Logs result object
                .catch(err => console.log(err)) // Logs error
        }

        let allmydata;

        function dataResponse() {
            return allmydata ?? null;
        }

        let users = [
            { id: 1, name: 'John Doe' },
            { id: 2, name: 'Jane Smith' },
            { id: 3, name: 'Bob Johnson' },
        ]

        console.log(users)
    </script>
    <form>
        <input type="text" name="client_id">
        <input type="submit" value="Submit">
    </form>
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
            <div id="clientAddressList">test</div>

{{--            <div x-data="dataResponse()" class="mt-16 xxl:mt-0 xxl:ml-auto">--}}

{{--                <div class="mt-4">--}}
{{--                    <label><input x-model="dato1" x-bind:checked="dato1" @click="inviaValoriCheckBox(dato1)"  type="checkbox" class="border border-1">--}}
{{--                        axios get https://reqres.in/api/unknown/2--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <template x-for="post in posts">--}}
{{--                    <h2 x-text="post.title"></h2>--}}
{{--                </template>--}}

{{--                <p x-show.transition="allmydata" x-text="allmydata"></p>--}}
{{--            </div>--}}
{{--            <div x-data="dataResponse()">--}}
{{--                <template x-for="a in data">--}}
{{--                    <h2 x-text="a.title"></h2>--}}
{{--                </template>--}}
{{--            </div>--}}

{{--            <ul>--}}
{{--                <li x-for="user in users" :key="user.id">--}}
{{--                    <h2 x-text="user.name ? user.name : 'N/A'"></h2>--}}
{{--                </li>--}}
{{--            </ul>--}}
            <ul x-data="users">
                <template x-for="number in users">
                    <th x-text="number.name"></th>
                </template>
            </ul>
        </div>
    </div>
</x-app-layout>
