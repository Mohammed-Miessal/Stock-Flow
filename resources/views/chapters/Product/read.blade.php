@extends('layouts.template')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('components.aside')


        <div class="flex flex-col flex-1 w-full">

            <!-- header -->
            @include('components.header')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <h2 class="my-6 text-2xl  text-gray-700 dark:text-gray-200">
                        Product List
                    </h2>
                    <div class="flex justify-end mb-4 ">
                        <a href="{{ route('product.create') }}">
                            <button
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Add Product
                            </button>
                        </a>

                    </div>
                    <div class="flex justify-between  mb-4 pr-2">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">

                            {{-- Search  --}}

                            <div class="relative text-gray-500 focus-within:text-purple-600">
                                <div class="absolute inset-y-0 flex items-center pl-2">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="search" id="search"
                                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:placeholder-gray-500 focus:bg-gray-100  focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                    type="text" placeholder="Search for product" aria-label="Search" />

                                <button id="Btn_search"
                                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Search
                                </button>
                            </div>

                            {{-- End Search --}}

                        </div>
                        <div class="w-28 flex justify-end ">
                            <a href="{{ route('export') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-9 h-9" viewBox="0 0 48 48">
                                    <path fill="#169154" d="M29,6H15.744C14.781,6,14,6.781,14,7.744v7.259h15V6z"></path>
                                    <path fill="#18482a" d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42H29v-8.946H14z">
                                    </path>
                                    <path fill="#0c8045" d="M14 15.003H29V24.005000000000003H14z"></path>
                                    <path fill="#17472a" d="M14 24.005H29V33.055H14z"></path>
                                    <g>
                                        <path fill="#29c27f" d="M42.256,6H29v9.003h15V7.744C44,6.781,43.219,6,42.256,6z">
                                        </path>
                                        <path fill="#27663f"
                                            d="M29,33.054V42h13.257C43.219,42,44,41.219,44,40.257v-7.202H29z">
                                        </path>
                                        <path fill="#19ac65" d="M29 15.003H44V24.005000000000003H29z"></path>
                                        <path fill="#129652" d="M29 24.005H44V33.055H29z"></path>
                                    </g>
                                    <path fill="#0c7238"
                                        d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z">
                                    </path>
                                    <path fill="#fff"
                                        d="M9.807 19L12.193 19 14.129 22.754 16.175 19 18.404 19 15.333 24 18.474 29 16.123 29 14.013 25.07 11.912 29 9.526 29 12.719 23.982z">
                                    </path>
                                </svg>
                            </a>
                            <a href="{{ route('export.csv') }}">
                                <img width="32" height="32"
                                    src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/100/external-csv-basic-ui-elements-2.3-sbts2018-outline-color-sbts2018.png"
                                    alt="external-csv-basic-ui-elements-2.3-sbts2018-outline-color-sbts2018" />
                            </a>
                        </div>


                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">image</th>
                                        <th class="px-4 py-3">name</th>
                                        <th class="px-4 py-3">reference</th>
                                        <th class="px-4 py-3">quantity</th>
                                        <th class="px-4 py-3">status</th>
                                        <th class="px-4 py-3">unit</th>
                                        <th class="px-4 py-3">price</th>
                                        {{-- <th class="px-4 py-3">status</th>
                                        <th class="px-4 py-3">category</th>
                                        <th class="px-4 py-3">tax</th>
                                        <th class="px-4 py-3">supplier</th>
                                        <th class="px-4 py-3">subcategorie</th> --}}
                                        <th class="px-4 py-3  ">actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                                    id="container_products">
                                    {{-- @foreach ($products as $product)
                                        <tr class="text-gray-700 dark:text-gray-400">

                                            <td class="px-4 py-3 text-sm">
                                                <img class="object-cover w-11 h-11"
                                                    src="{{ asset('storage/' . $product->image) }}" alt="product image"
                                                    loading="lazy" />
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $product->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $product->reference }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $product->quantity }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $product->unit->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $product->price }}
                                            </td>
                                            <!-- Action -->
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                   
                                                    <a href="{{ route('product.show', $product->id) }}">
                                                        <button
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                            aria-label="Show">
                                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                   
                                                    <a href="{{ route('product.edit', $product->id) }}">
                                                        <button
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                            aria-label="Edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                   
                                                    <form action="{{ route('product.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                            aria-label="Delete">
                                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>

                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing 21-30 of 100
                            </span>
                            <span class="col-span-2"></span>
                            <!-- Pagination -->
                            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                <nav aria-label="Table navigation">
                                    <ul class="inline-flex items-center">
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                aria-label="Previous">
                                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                    <path
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                1
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                2
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                3
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                4
                                            </button>
                                        </li>
                                        <li>
                                            <span class="px-3 py-1">...</span>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                8
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                9
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                aria-label="Next">
                                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                    <path
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const search = document.getElementById("search");
        const container = document.getElementById("container_products");
        const btn_Search = document.getElementById("Btn_search");


        btn_Search.addEventListener("click", (event) => {
            event.preventDefault();
            container.innerHTML = "";
            load(search.value);
        });

        search.addEventListener("keyup", (event) => {
            event.preventDefault();
            const inputValue = search.value;
            container.innerHTML = "";
            load(search.value);

        });

        function load(search) {
            fetch(`http://127.0.0.1:8000/search/?search=${search}`)
                .then(response => response.json())
                .then(function(result) {
                    container.innerHTML = ""; // clear the container
                    result.forEach((product) => {
                        container.innerHTML +=
                            `
                        <tr class="text-gray-700 dark:text-gray-400">
                                                
                            <td class="px-4 py-3 text-sm">
                                <img class="object-cover w-11 h-11"
                                    src="storage/${product.image}" alt="product image"
                                    loading="lazy" />
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.name}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.reference}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.quantity}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.status == 'active' ? `<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">${product.status}</span>` : `<span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">${product.status}</span>`}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.unit_id}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${product.price}
                            </td>
                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                
                                    <a href="product/${product.id}">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Show">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>
                                
                                    <a href="product/${product.id}/edit">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>
                                
                                    <form action="product/${product.id}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    
                                    </form>
                            </td>
                        </tr>
                    `;
                    });
                }).catch(error => console.log('error', error));
        }

        load("");
    </script>
@endsection
